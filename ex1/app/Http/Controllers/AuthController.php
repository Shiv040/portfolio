<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login'); 
    }
 public function registerForm(Request $request)
{
    if ($request->isMethod('post')) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone',
            'account_type' => 'required',
            'deposit_amount' => 'required|numeric|min:1000',
            'password' => 'required|confirmed|min:6',
        ]);

        DB::beginTransaction();

        try {

            // Generate Account Number
            $accountNumber = date('Ymd') . rand(100000,999999);

            // Generate OTP
            $otp = rand(100000,999999);

            // Create User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'account_type' => $request->account_type,
                'account_number' => $accountNumber,
                'balance' => $request->deposit_amount,
                'otp' => $otp,
                'status' => 'pending',
                'password' => Hash::make($request->password),
            ]);

            // Opening Transaction Entry
            Transaction::create([
                'user_id' => $user->id,
                'account_number' => $accountNumber,
                'type' => 'credit',
                'amount' => $request->deposit_amount,
                'description' => 'Opening Balance'
            ]);

            DB::commit();

            return redirect('/verify-otp')->with('success','OTP Sent');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Something went wrong');
        }
    }

    return view('register');
}
}