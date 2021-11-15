<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CreditImport;
use App\Models\Credit;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CreditController extends Controller
{
    public function index()
    {
//        $data = User::with('debts')->selectRaw('sum(user.debts.debt) as balance')->get();
        $credits = User::with('debts')->addSelect([
            'balance' => Credit::selectRaw('COALESCE(SUM(debt),0) - COALESCE(SUM(credit),0)  as balance')
                ->whereColumn('user_id', 'users.id')
                ->groupBy('user_id')])
            ->paginate(15);
//            ->get();
//       return $credits;
//        $customer = User::paginate(15);
        return view('admin.credit.index', [
            'customers' => $credits,
//            'customers' => $customer
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new CreditImport(), $request->file('credit'));
        return redirect()->back()->with('message', 'Import Credit Success!');
    }

    public function show($id)
    {
        $balance = User::addSelect([
            'balance' => Credit::selectRaw('COALESCE(SUM(debt),0) - COALESCE(SUM(credit),0)  as balance')
                ->whereColumn('user_id', 'users.id')
                ->groupBy('user_id')])
            ->find($id);

        $credits = Credit::where('user_id', $id)->paginate(25);

            return $credits;
    }
}
