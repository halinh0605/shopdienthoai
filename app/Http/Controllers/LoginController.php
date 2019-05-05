<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    
    public function getLogin() {
    	return view('admin.login');
    }

    public function postLogin(Request $request) {
//        $rules = [
//            'email' =>'required|email',
//            'password' => 'required|min:8'
//        ];
//        $messages = [
//            'email.required' => 'Email là trường bắt buộc',
//            'email.email' => 'Email không đúng định dạng',
//            'password.required' => 'Mật khẩu là trường bắt buộc',
//            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
//        ];
//        $validator = Validator::make($request->all(), $rules, $messages);
//    	if ($validator->fails()) {
//    		return redirect()->back()->withErrors($validator)->withInput();
//    	} else {
//    		$username = $request->input('username');
//    		$password = $request->input('password');

            $email = $request->input('username');
            $password =$request->input('password');

            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                return redirect('dashboard');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                return  $errors;
            }
//    	}
    }


}
