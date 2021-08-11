<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function viewParents()
    {
        $customers = Customer::orderBy('id', 'DESC')->where('type','1')->get();

        return view('admin.parents.list',compact('customers'));
    }


    public function showParents($id)
    {
        $customers = Customer::find($id);

        return view('admin.parents.show',compact('customers'));
    }


    public function editParents($id)
    {
        $customers = Customer::find($id);

        return view('admin.parents.edit',compact('customers'));
    }


    public function deleteParents($id)
    {
        $deleted = Customer::find($id)->delete();

        if ($deleted) {
            return redirect(route('view-parents'))->with('msg','Parent Deleted Successfully.');

        }else{

            return redirect(route('view-parents'))->with('msg','Parent Not Deleted.');
        }
    }
}
