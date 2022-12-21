<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminStatistic extends Controller
{
    public function AuthLogin()
    {
        $UserID_employee = Session::get('UserID_employee');
        $UserID_manager = Session::get('UserID_manager');
        
        if ($UserID_employee or $UserID_manager ) {
        } else {
            return Redirect::to('/login')->send();
        }
    }

    public function index_statistic(?int $year = null)
    {
        $this->AuthLogin();

        $index_statistic = DB::table('order')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->select(
                'order.*',
                'transport.Status as Trans_Status'
            )->get();

        $revenueStatistic = AdminStatistic::RevenueStatistic();
        $benefitStatistic = AdminStatistic::BenefitStatistic();
        $orderStatistic = AdminStatistic::OrderStatistic();
        $cusStatistic = AdminStatistic::CusStatistic();

        $memberStatistic = AdminStatistic::MemberStatistic();
        $guestStatistic = AdminStatistic::GuestStatistic();

        $revenueStatisticByMonth = array();
        $benefitStatisticByMonth = array();

        for ($i = 1; $i <= 12; $i++) {
            if (is_null($year)) {
                array_push($revenueStatisticByMonth, AdminStatistic::RevenueStatisticByMonth($i, date("Y")));
                array_push($benefitStatisticByMonth, AdminStatistic::BenefitStatisticByMonth($i, date("Y")));
            } else {
                array_push($revenueStatisticByMonth, AdminStatistic::RevenueStatisticByMonth($i, $year));
                array_push($benefitStatisticByMonth, AdminStatistic::BenefitStatisticByMonth($i, $year));
            }
        }

        $topProducts = DB::table('Order_Details')
            ->join('Product', 'Product.proid', '=', 'Order_Details.proid')
            ->select('product.proid AS PRO', 'proname', DB::raw('sum(quantity) as Sales'))
            ->groupBy('product.proid', 'proname')
            ->orderByDesc('Sales', 'PRO')
            ->take(5)
            ->get();

        $topProId = array();
        $topProImg = array();
        $topProName = array();
        $topProSales = array();
        $topProEarning = array();
        $topProStockLeft = array();

        foreach ($topProducts as $item) {
            array_push($topProId, $item->PRO);
            array_push($topProName, $item->proname);
            array_push($topProSales, $item->Sales);

            array_push($topProEarning, AdminStatistic::ProEarning($item->PRO));
            array_push($topProStockLeft, AdminStatistic::ProStockLeft($item->PRO));

            $a = DB::table('Product_Image')
                ->where('proid', $item->PRO)
                ->where('imgdata', 'LIKE', '%is_avat%')
                ->select('imgdata')
                ->first();
            if ($a == null) {
                array_push($topProImg, 'none.jpg');
            } else {
                array_push($topProImg, $a);
            }
        }


        $yyyy = array();
        for ($i = date("Y"); $i >= 2019; $i--) {
            array_push($yyyy, $i);
        }

        $manager_index_statistic = view('admin.statistic.index_statistic')
            ->with('index_statistic', $index_statistic)
            ->with('revenueStatistic', $revenueStatistic)
            ->with('benefitStatistic', $benefitStatistic)
            ->with('orderStatistic', $orderStatistic)
            ->with('cusStatistic', $cusStatistic)
            ->with('memberStatistic', $memberStatistic)
            ->with('guestStatistic', $guestStatistic)
            ->with('revenueStatisticByMonth', $revenueStatisticByMonth)
            ->with('benefitStatisticByMonth', $benefitStatisticByMonth)
            ->with('topProId', $topProId)
            ->with('topProImg', $topProImg)
            ->with('topProName', $topProName)
            ->with('topProSales', $topProSales)
            ->with('topProEarning', $topProEarning)
            ->with('topProStockLeft', $topProStockLeft)
            ->with('yyyy', $yyyy);
        return view('admin_layout_manager')->with('admin.statistic.index_statistic', $manager_index_statistic);
    }

    public function RevenueStatistic()
    {
        $this->AuthLogin();

        $TotalRevenue = DB::table('order')
            ->where('status', 1)
            ->sum('OrderTotal');
        if (is_null($TotalRevenue)) {
            $TotalRevenue = 0;
        }
        return $TotalRevenue;
    }

    public function RevenueStatisticByMonth(int $month, int $year)
    {
        $this->AuthLogin();

        $TotalRevenue = DB::table('order')
            ->where('status', 1)
            ->whereMonth('OrderDate', $month)
            ->whereYear('OrderDate', $year)
            ->sum('OrderTotal');
        if (is_null($TotalRevenue)) {
            $TotalRevenue = 0;
        }
        return $TotalRevenue;
    }

    public function BenefitStatistic()
    {
        $this->AuthLogin();

        $thu = DB::table(DB::table('order')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->where('order.status', 1)
            ->selectraw('OrderTotal - Fee as THU'))
            ->sum('THU');
        $von = DB::table(DB::table('order_details')
            ->join('order', 'order.orderid', '=', 'order_details.orderid')
            ->join('product', 'product.proid', '=', 'order_details.proid')
            ->where('order.status', 1)
            ->selectraw('Quantity * OriginalPrice as VON'))
            ->sum('VON');

        $TotalBenefit = $thu - $von;
        return $TotalBenefit;
    }

    public function BenefitStatisticByMonth(int $month, int $year)
    {
        $this->AuthLogin();

        $thu = DB::table(DB::table('order')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->where('order.status', 1)
            ->whereMonth('OrderDate', $month)
            ->whereYear('OrderDate', $year)
            ->selectraw('OrderTotal - Fee as THU'))
            ->sum('THU');
        $von = DB::table(DB::table('order_details')
            ->join('order', 'order.orderid', '=', 'order_details.orderid')
            ->join('product', 'product.proid', '=', 'order_details.proid')
            ->where('order.status', 1)
            ->whereMonth('OrderDate', $month)
            ->whereYear('OrderDate', $year)
            ->selectraw('Quantity * OriginalPrice as VON'))
            ->sum('VON');

        $TotalBenefit = $thu - $von;
        return $TotalBenefit;
    }

    public function OrderStatistic()
    {
        $this->AuthLogin();

        $orderNum = DB::table('order')
            ->count();
        return $orderNum;
    }

    public function CusStatistic()
    {
        $this->AuthLogin();

        $cusNum = DB::table('customer')
            ->count();
        return $cusNum;
    }

    public function MemberStatistic()
    {
        $this->AuthLogin();

        $memNum = DB::table('customer')
            ->where('userid', '<>', null)
            ->count();
        return $memNum;
    }

    public function GuestStatistic()
    {
        $this->AuthLogin();

        $guestNum = DB::table('customer')
            ->where('userid', null)
            ->count();
        return $guestNum;
    }

    public function ProStockLeft(int $id)
    {
        $this->AuthLogin();

        $StockLeft = DB::table('stock')
            ->where('proid', $id)
            ->sum('quantity');
        if ($StockLeft == null) {
            return 0;
        }
        return $StockLeft;
    }
    public function ProEarning(int $id)
    {
        $this->AuthLogin();

        $Earning = DB::table(DB::table('order_details')
            ->where('proid', $id)
            ->selectRaw('quantity * price as Earning'))
            ->sum('Earning');
        if ($Earning == null) {
            return 0;
        }
        return $Earning;
    }
}
