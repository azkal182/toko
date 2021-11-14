<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::paginate(15);

        return view('admin.user.customer', compact('customers'));
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport(), $request->file('file'));
        return redirect()->back()->with('message', 'Import Success!');
    }
}
