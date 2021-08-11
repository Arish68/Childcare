<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function viewTeachers()
    {
        $customers = Customer::orderBy('id', 'DESC')->where('type','0')->where('admin_approved','!=',null)->get();

        return view('admin.teachers.list',compact('customers'));
    }

    public function viewPendingTeachers()
    {
        $customers = Customer::orderBy('id', 'DESC')->where('type','0')->where('admin_approved',null)->get();
        $is_pending = array('1');
        return view('admin.teachers.list',compact('customers','is_pending'));
    }
    public function showTeachers($id)
    {
        $customers = Customer::find($id);

        return view('admin.teachers.show',compact('customers'));
    }


    public function editTeachers($id)
    {
        $customers = Customer::find($id);

        return view('admin.teachers.edit',compact('customers'));
    }


    public function deleteTeachers($id)
    {
        $deleted = Customer::find($id)->delete();

        if ($deleted) {
            return redirect(route('view-teachers'))->with('msg','Teacher Deleted Successfully.');

        }else{

            return redirect(route('view-teachers'))->with('msg','Teacher Not Deleted.');
        }
    }
    public function approveTeachers($id)
    {
        $approve = Customer::find($id);
        $approve->admin_approved = true;
        $approve->save();
        if ($approve) {
            return redirect(route('view-teachers'))->with('msg','Teacher Approved Successfully.');

        }else{

            return redirect(route('view-teachers'))->with('msg','Teacher Not Approve.');
        }
    }
}
