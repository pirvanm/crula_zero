<?php
namespace App\Http\Controllers\Auth;

use IlluminateHttpRequest;
use App\Http\Controllers\Controller;
use AppUser;
use AppMailHello;

class RegisteredUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function create()
    {
        return view('auth.register');
    }
    
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        session()->flash('message', '<b>Hi there!</b> Thanks for signing up!');
        session()->flash('type', 'success');
    
        Mail::to($user)->send(new Hello($user));
        
        return redirect()->to('/games');
    }
}