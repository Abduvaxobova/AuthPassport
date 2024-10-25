<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Passport;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use APP\Http\Controllers\PassporttController;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect()->route('loginForm');
    }
    public function loginForm(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('passports.index');
        }
        return back()->withErrors(['email' => 'Email or password is incorrect.']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginForm');
    }
}