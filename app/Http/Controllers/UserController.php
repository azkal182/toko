<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $balance = User::addSelect([
            'balance' => Credit::selectRaw('COALESCE(SUM(debt),0) - COALESCE(SUM(credit),0)  as balance')
                ->whereColumn('user_id', 'users.id')
                ->groupBy('user_id')])
            ->find(\Auth::user()->id)->balance;
        $credits = Credit::where('user_id', \Auth::user()->id )->orderBy('id', 'DESC')->paginate(25);


        return view('home', [
            'balance' => $balance,
            'credits' => $credits
        ]);
    }
}
