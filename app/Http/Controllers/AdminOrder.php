<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminOrder extends Controller
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

    public function index_order()
    {
        $this->AuthLogin();

        $index_order = DB::table('order')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->select(
                'order.*',
                'transport.Status as Trans_Status'
            )->get();
        $insert_store_id = DB::table('store')->where('store.isdeleted', 0)->get();
        $manager_index_order = view('admin.order.index_order')->with('index_order', $index_order)->with('insert_store_id', $insert_store_id);
        return view('admin_layout')->with('admin.order.index_order', $manager_index_order);
    }


    public function detail_order($order_id)
    {
        $this->AuthLogin();

        $detail_order = DB::table('order')->join('address', 'order.addid', '=', 'address.addid')
            ->join('store', 'order.storeid', '=', 'store.storeid')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->join('customer', 'order.cusid', '=', 'customer.cusid')
            ->where('orderid', $order_id)
            ->select(
                'order.*',
                'address.City as Add_City',
                'address.District as Add_District',
                'address.Ward as Add_Ward',
                'address.SpecificAddress as Add_SpecificAddress',
                'store.City as Store_City',
                'store.District as Store_District',
                'store.Ward as Store_Ward',
                'store.SpecificAddress as Store_SpecificAddress',
                'transport.ShippingDate as Trans_ShippingDate',
                'transport.Transporter as Trans_Transporter',
                'transport.Status as Trans_Status',
                'transport.Fee as Trans_Fee',
                'transport.Type as Trans_Type',
                'customer.FirstName as Cus_FirstName',
                'customer.LastName as Cus_LastName',
                'customer.Gender as Cus_Gender',
                'customer.Phone as Cus_Phone',
                'customer.Email as Cus_Email'
            )->get();

        $detail_orderDetails = DB::table('order_details')
            ->join('product', 'order_details.proid', '=', 'product.proid')
            ->where('order_details.orderid', $order_id)
            ->select(
                'order_details.*',
                'product.ProName as Pro_ProName',
                'product.Unit as Pro_Unit'
            )->get();

        $manage_detail_order = view('admin.order.detail_order')->with('detail_order', $detail_order)->with('detail_orderDetails', $detail_orderDetails);
        return view('admin_layout')->with('admin.order.detail_order', $manage_detail_order);
    }

    public function edit_order($order_id)
    {
        $this->AuthLogin();

        $edit_order = DB::table('order')
            ->join('transport', 'order.transid', '=', 'transport.transid')
            ->join('customer', 'order.cusid', '=', 'customer.cusid')
            ->join('reward', 'customer.rewardid', '=', 'reward.rewardid')
            ->where('OrderId', $order_id)
            ->select(
                'order.*',
                'transport.ShippingDate as Trans_ShippingDate',
                'transport.Transporter as Trans_Transporter',
                'transport.Status as Trans_Status',
                'transport.Fee as Trans_Fee',
                'transport.Type as Trans_Type',
                'customer.RewardID as Cus_RewardID',
                'reward.Point as Reward_Point',
                'reward.CusType as Reward_CusType'
            )->get();
        $manage_edit_order = view('admin.order.edit_order')
            ->with('edit_order', $edit_order);

        return view('admin_layout')->with('admin.order.edit_order', $manage_edit_order);
    }

    public function update_order(Request $request, $order_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['Status'] = $request->Status;
        DB::table('order')->where('OrderID', $order_id)->update($data);
        $data2 = array();
        $data2['Status'] = $request->Trans_Status;
        if ($request->Trans_Status == 4) {
            $data2['Transporter'] = $request->Trans_Transporter;
        }
        $data2['ShippingDate'] = $request->Trans_ShippingDate;
        DB::table('transport')->where('TransID', $request->TransID)->update($data2);
        if ($request->Trans_Status == 6) {
            $data3 = array();
            $point_upd = $request->Reward_Point + $request->OrderTotal;
            $data3['Point'] = $point_upd;
            if ($point_upd >= 9000000) {
                $data3['CusType'] = 1;
            } else if ($point_upd >= 4000000) {
                $data3['CusType'] = 2;
            } else {
                $data3['CusType'] = 3;
            }
            DB::table('reward')->where('RewardID', $request->Cus_RewardID)->update($data3);
        }


        Session::put('add_order_message', 'Cập nhật thành công!');
        return Redirect::to('edit-order/' . $order_id);
    }
}
