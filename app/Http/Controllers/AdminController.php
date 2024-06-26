<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function createAdminUser()
    {
        $user = new User();
        $user->name = 'user Test';
        $user->pass = Hash::make('password123');
        $user->phone = '111111111';
        $user->email = 'user@test.com';
        $user->role = 1; 
        $user->save();

        return 'Admin user created successfully!';
    }
    public function loginAdmin()
    {
        return view('/login.loginView');
    }
    public function loginVerify(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) { 
                // Đăng nhập thành công cho admin
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Tài khoản không có quyền admin');
                // return 'Tài khoản không có quyền admin';
                // return back()->withErrors(['email' => 'Tài khoản không có quyền admin']);
                // return response()->json(['error' => 'Tài khoản không có quyền admin !'], 400)->back();
            }
        }

        // return 'Không có tài khoản';
        return redirect()->route('login')->with('error', 'Tài khoản không tồn tại');
        // return back()->withErrors(['email' => 'Tài khoản không tồn tại !'], 400);
        // return response()->json(['error' => 'Tài khoản không tồn tại !'], 400)->back();
    }
}
