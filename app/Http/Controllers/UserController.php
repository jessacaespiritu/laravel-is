<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class UserController extends Controller
{

    public function register(){
        return view ('user.register');
    }

    public function login(){
        return view('user.login');
    }

    public function process(Request $req){
        $validated = $req->validate([
            "email"=>['requirede', 'email'],
            'password'=>'required'
        ]);

          if(auth()->attempt($validated)){
            $req->session()->regenerate();

             return redirect("/");
        }
    


    }
    public function store(Request $req){
        //dd($req);
        $validated=$req->validate([
            "name"=>['required','min:4'],
            "email"=>['required','email', Rule::unique('users','email'),],
            "password"=>'required|confirmed|min:6'
        ]);

        $validated['password']=Hash::make($validated['password']);
        $user=User::create($validated);

        return redirect("/");

    }
    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('login');
    }

    public function updateCustomer(Request $req){
        $req->validate([
            "lastName" =>['required','min:4'],
            "firstName" =>['required','min:4'],
            "email"=>['required','email',
            Rule::unique('users', 'email'),],
            "contactNumber"=>['required', 'min:4'],
            "email" =>['required', 'email'], 
            "address"=>['required', 'min:4']
         ]);
         $data=Customer::find($req->id);
         $data->id=$req->id;
         $data->lastName=$req->lastName;
         $data->firstName=$req->firstName;
         $data->email=$req->email;
         $data->contactNumber=$req->contactNumber;
         $data->address=$req->address;

         $data->save();
         return redirect("/")->with('success', 'Customer edited successfully.');

    }

    
}
