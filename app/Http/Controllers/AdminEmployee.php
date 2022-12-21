<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminEmployee extends Controller
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

    public function all_employee()
    {
        $this->AuthLogin();

        $all_employee = DB::table('employee')->join('store', 'employee.storeid', '=', 'store.storeid')
            ->select(
                'employee.*',
                'store.city as store_city',
                'store.SpecificAddress as store_address',
                'store.IsDeleted as store_isdeleted',
                DB::raw('DATE_FORMAT(employee.startdate, "%d-%m-%Y ") as StartDate')
            )
            ->where('employee.IsDeleted', 0)->get();
        $manager_all_employee = view('admin.employee.admin_employee')->with('all_employee', $all_employee);
        return view('admin_layout_manager')->with('admin.employee.admin_employee', $manager_all_employee);
    }

    public function create_employee()
    {
        $this->AuthLogin();

        $insert_store_id = DB::table('store')->get();
        $manage_insert_store_id = view('admin.employee.create_employee')->with('insert_store_id', $insert_store_id);
        return view('admin_layout_manager')->with('admin.employee.create_employee', $manage_insert_store_id);
    }

    public function save_employee(Request $request)
    {
        $this->AuthLogin();

        $user_employee = DB::table('user')->where('user.UserName', $request->employee_user)->get()->toArray();
        $startdate = $request->startdate;
        if (is_null($startdate)) {
            Session::put('add_employee_message_fail', 'Chưa nhập ngày vào làm');
            return Redirect::to('create-employee');
        }
        $startdate = explode("/", $startdate);
        $startdate = $startdate[1] . "-" . $startdate[0] . "-" . $startdate[2];
        $startdate = date('Y-m-d', strtotime($startdate));

        // echo $request->employee_pass;
        // echo $request->employee_pass_confirm;
        // echo $user_employee;
        if (empty($user_employee)) {
            if ($request->employee_pass === $request->employee_pass_confirm) {
                $id_employee = DB::table('user')->max('userid') + 1;
                $data_user = array();
                $data_user['UserID'] = $id_employee;
                $data_user['UserPassword'] = md5($request->employee_pass);
                $data_user['UserName'] = $request->employee_user;
                $data_user['UserRole'] = 2;
                $data_user['IsDeleted'] = 0;
                DB::table('user')->insert($data_user);

                $data = array();
                $data['UserID'] = $id_employee;
                $data['LastName'] = $request->employeeLastName;
                $data['FirstName'] = $request->employeeFirstName;
                $data['Gender'] = $request->employeeGender;
                $data['SpecificAddress'] = $request->address;
                $data['StartDate'] = $startdate;
                $data['StoreID'] = $request->store_id;
                $data['Phone'] = $request->phone;
                $data['Email'] = $request->email;
                $data['IsDeleted'] = 0;
                DB::table('employee')->insert($data);

                Session::put('add_employee_message', 'Thêm nhân viên thành công!');
                return Redirect::to('all-employee');
            } else {
                Session::put('add_employee_message_fail', 'Xác nhận mật khẩu không thành công');
                return Redirect::to('create-employee');
            }
        } else {
            Session::put('add_employee_message_fail', 'Tên tài khoản đã tồn tại');
            return Redirect::to('create-employee');
        }
    }

    public function detail_employee($employee_id)
    {
        $this->AuthLogin();

        $detail_employee = DB::table('employee')->join('store', 'employee.StoreID', '=', 'store.StoreID')->where('empid', $employee_id)
            ->select('employee.*', 'store.city as store_city', 'store.SpecificAddress as store_address', 'store.district as store_district', 'store.ward as store_ward')
            ->get();

        $startdate = $detail_employee[0]->StartDate;
        //echo $startdate;
        $startdate1 = explode("-", $startdate);
        $startdate = explode(" ", $startdate1[2]);
        $startdate = $startdate[0] . "-" . $startdate1[1] . "-" . $startdate1[0];
        //echo $startdate;
        //$startdate = date('Y-m-d', strtotime($startdate));

        $manage_detail_employee = view('admin.employee.detail_employee')
            ->with('detail_employee', $detail_employee)
            ->with('startdate', $startdate);
        return view('admin_layout_manager')->with('admin.customer.detail_employee', $manage_detail_employee);
    }

    public function edit_employee($employee_id)
    {
        $this->AuthLogin();


        $insert_store_id = DB::table('store')->get();
        //$manage_insert_store_id = view('admin.employee.edit_employee')->with('insert_store_id', $insert_store_id);

        $edit_employee = DB::table('employee')
            ->select('employee.*', DB::raw('DATE_FORMAT(employee.startdate, "%d-%m-%Y ") as StartDate'))->where('empid', $employee_id)->get();
        $manage_edit_employee = view('admin.employee.edit_employee')->with('insert_store_id', $insert_store_id)
            ->with('edit_employee', $edit_employee);

        return view('admin_layout_manager')->with('admin.customer.edit_employee', $manage_edit_employee);
    }

    public function update_employee(Request $request, $employee_id)
    {
        $this->AuthLogin();

        $startdate = $request->startdate;
        $enddate = $request->enddate;
        if (is_null($startdate)) {
            $startdate = $request->startdate;
        } else {
            $startdate = explode("/", $startdate);
            $startdate = $startdate[1] . "-" . $startdate[0] . "-" . $startdate[2];
            $startdate = date('Y-m-d', strtotime($startdate));
        }

        if (is_null($enddate)) {
            $enddate = $request->enddate;
        } else {
            $enddate = explode("/", $enddate);
            $enddate = $enddate[1] . "-" . $enddate[0] . "-" . $enddate[2];
            $enddate = date('Y-m-d', strtotime($enddate));
        }

        $data = array();
        $data['LastName'] = $request->employeeLastName;
        $data['FirstName'] = $request->employeeFirstName;
        $data['Gender'] = $request->employeeGender;
        $data['SpecificAddress'] = $request->address;
        $data['StartDate'] = $startdate;
        $data['EndDate'] = $enddate;
        $data['StoreID'] = $request->store_id;
        $data['Phone'] = $request->phone;
        $data['Email'] = $request->email;
        DB::table('employee')->where('empid', $employee_id)->update($data);
        Session::put('add_employee_message', 'Sửa thông tin nhân viên thành công!');
        return Redirect::to('all-employee');
    }

    public function delete_employee($employee_id)
    {
        $this->AuthLogin();

        //$manage_insert_store_id = view('admin.employee.edit_employee')->with('insert_store_id', $insert_store_id);

        $edit_employee = DB::table('employee')->where('empid', $employee_id)->get();
        $insert_store_id = DB::table('store')->where('storeid', $edit_employee[0]->StoreID)->get();

        $manage_edit_employee = view('admin.employee.delete_employee')
            ->with('insert_store_id', $insert_store_id)
            ->with('edit_employee', $edit_employee);


        return view('admin_layout_manager')->with('admin.customer.delete_employee', $manage_edit_employee);
    }

    public function soft_delete_employee($employee_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['IsDeleted'] = 1;
        DB::table('employee')->where('empid', $employee_id)->update($data);
        Session::put('delete_employee_message', 'Xoá thông tin nhân viên thành công!');
        return Redirect::to('all-employee');
    }
}
