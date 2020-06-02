<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index(Request $request)
    {

        $totalAmount = $request->input('totalAmount', 0);

        $data = [
            'totalAmount' => $totalAmount
        ];
        return view('checkout.index', $data);

    }
}
