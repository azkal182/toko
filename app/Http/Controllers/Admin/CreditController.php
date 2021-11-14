<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\User;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
//        $data = User::with('debts')->selectRaw('sum(user.debts.debt) as balance')->get();
        $credits = User::with('debts')->addSelect([
            'balance' => Credit::selectRaw('sum(debt) - sum(credit)  as balance')
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
}
