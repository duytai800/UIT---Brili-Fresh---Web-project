<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminStock extends Controller
{
    public function AuthLogin()
    {
        $UserID_employee = Session::get('UserID_employee');
        $UserID_manager = Session::get('UserID_manager');
        if ($UserID_employee == 2 or $UserID_manager == 3) {
        } else {
            return Redirect::to('/login')->send();
        }
    }

    public function index_stock()
    {
        $this->AuthLogin();

        $index_stock = DB::table('stock')->join('store', 'stock.storeid', '=', 'store.storeid')
            ->join('product', 'stock.proid', '=', 'product.proid')->where('store.isdeleted', 0)->where('product.isdeleted', 0)
            ->select(
                'stock.*',
                'store.SpecificAddress as Store_SpecificAddress',
                'store.Ward as Store_Ward',
                'store.District as Store_District',
                'store.City as Store_City',
                'product.ProName as Pro_ProName'
            )->get();

        $insert_store_id = DB::table('store')->where('store.isdeleted', 0)->get();
        $manager_index_stock = view('admin.stock.index_stock')->with('index_stock', $index_stock)->with('insert_store_id', $insert_store_id);
        return view('admin_layout')->with('admin.stock.index_stock', $manager_index_stock);
    }

    public function create_stock(?int $store_id = null)
    {
        $this->AuthLogin();

        $insert_store_id = DB::table('store')->where('isdeleted', 0)->get();
        $insert_pro_id = DB::table('product')->where('isdeleted', 0)->get();
        $manage_insert_store_pro_id = view('admin.stock.create_stock')->with('insert_store_id', $insert_store_id)->with('insert_pro_id', $insert_pro_id);
        return view('admin_layout')->with('admin.stock.create_stock', $manage_insert_store_pro_id);
    }

    public function save_stock(Request $request)
    {
        $this->AuthLogin();

        $stock = DB::table('stock')->where('storeid', $request->store_id)->where('proid', $request->pro_id)
            ->select('stock.quantity')->first();
        $data = array();
        if (is_null($stock)) {
            $data['StoreID'] = $request->store_id;
            $data['ProID'] = $request->pro_id;
            $data['Quantity'] = $request->quantity;
            DB::table('stock')->insert($data);
        } else {
            $data['Quantity'] = $request->quantity + $stock->quantity;
            DB::table('stock')->where('storeid', $request->store_id)->where('proid', $request->pro_id)->update($data);
        }
        Session::put('add_stock_message', 'Thêm thong tin kho thành công!');
        return Redirect::to('index-stock');
    }

    public function detail_stock($store_id, $pro_id)
    {
        $this->AuthLogin();

        $detail_stock = DB::table('stock')->join('store', 'stock.storeid', '=', 'store.storeid')
            ->join('product', 'stock.proid', '=', 'product.proid')->where('store.isdeleted', 0)->where('product.isdeleted', 0)
            ->where('stock.storeid', $store_id)->where('stock.proid', $pro_id)
            ->select(
                'stock.*',
                'store.SpecificAddress as Store_SpecificAddress',
                'store.Ward as Store_Ward',
                'store.District as Store_District',
                'store.City as Store_City',
                'product.ProName as Pro_ProName'
            )->get();
        $manage_detail_stock = view('admin.stock.detail_stock')->with('detail_stock', $detail_stock);
        return view('admin_layout')->with('admin.stock.detail_stock', $manage_detail_stock);
    }

    public function edit_stock($store_id, $pro_id)
    {
        $this->AuthLogin();

        $edit_stock = DB::table('stock')->join('store', 'stock.storeid', '=', 'store.storeid')
            ->join('product', 'stock.proid', '=', 'product.proid')->where('store.isdeleted', 0)->where('product.isdeleted', 0)
            ->where('stock.storeid', $store_id)->where('stock.proid', $pro_id)
            ->select(
                'stock.*',
                'store.SpecificAddress as Store_SpecificAddress',
                'store.Ward as Store_Ward',
                'store.District as Store_District',
                'store.City as Store_City',
                'product.ProName as Pro_ProName'
            )->get();
        $manage_edit_stock = view('admin.stock.edit_stock')
            ->with('edit_stock', $edit_stock);

        return view('admin_layout')->with('admin.stock.edit_stock', $manage_edit_stock);
    }

    public function update_stock(Request $request, $store_id, $pro_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['Quantity'] = $request->quantity;
        DB::table('stock')->where('storeid', $store_id)->where('proid', $pro_id)->update($data);
        Session::put('add_stock_message', 'Sửa thông tin kho thành công!');
        return Redirect::to('index-stock');
    }

    public function delete_stock($store_id, $pro_id)
    {
        $this->AuthLogin();

        $delete_stock = DB::table('stock')->join('store', 'stock.storeid', '=', 'store.storeid')
            ->join('product', 'stock.proid', '=', 'product.proid')->where('store.isdeleted', 0)->where('product.isdeleted', 0)
            ->where('stock.storeid', $store_id)->where('stock.proid', $pro_id)
            ->select(
                'stock.*',
                'store.SpecificAddress as Store_SpecificAddress',
                'store.Ward as Store_Ward',
                'store.District as Store_District',
                'store.City as Store_City',
                'product.ProName as Pro_ProName'
            )->get();
        $manage_delete_stock = view('admin.stock.delete_stock')
            ->with('delete_stock', $delete_stock);

        return view('admin_layout')->with('admin.stock.delete_stock', $manage_delete_stock);
    }

    public function confirm_delete_stock($store_id, $pro_id)
    {        $this->AuthLogin();

        DB::table('stock')->where('storeid', $store_id)->where('proid', $pro_id)->delete();
        Session::put('add_stock_message', 'Xoá thông tin kho thành công!');
        return Redirect::to('index-stock');
    }
}
