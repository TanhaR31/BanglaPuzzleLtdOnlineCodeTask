<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogger;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    //New Blogger Registration
    public function registration()
    {
        $last = DB::table('bloggers')
            ->orderBy('id', 'desc')
            ->first();
        if ($last) {
            $data = $last->id + 1;
            return view('pages.registration')->with('data', $data);
        } else
            return view('pages.registration');
    }
    public function registrationSubmitted(Request $request)
    {
        //     return $request;
        $validate = $request->validate(
            [
                'b_name' => 'required|min:3|max:20',
                'b_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
                'b_email' => 'email',
                'b_password' => 'required|min:5|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'b_password_confirm' => 'required|same:b_password',
                'b_address' => 'required',
                'b_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'b_password.regex' => 'English uppercase characters (A - Z),
                    English lowercase characters (a - z),
                    Base 10 digits (0 - 9),
                    Non-alphanumeric (For example: !, $, #, or %),
                    Unicode characters',
            ]
        );
        $phone = Blogger::where('b_phone', '=', $request->b_phone)->first();
        $email = Blogger::where('b_email', '=', $request->b_email)->first();
        if ($phone) {
            return redirect()->back()->with('exist', 'This Phone Number Already Exists. Use Another Number Please');
        } elseif ($email) {
            return redirect()->back()->with('exist', 'This Email Address Already Exists. Use Another Email Please');
        } else {
            $blogger = new Blogger();
            $blogger->id = $request->id;
            $blogger->b_name = $request->b_name;
            $blogger->b_phone = $request->b_phone;
            $blogger->b_email = $request->b_email;
            $blogger->b_password = md5($request->b_password);
            $blogger->b_address = $request->b_address;
            $imageName = time() . "_" . $request->file('b_image')->getClientOriginalName();
            $request->b_image->move(public_path('images'), $imageName);
            $blogger->b_image = $imageName;
            $blogger->save();

            return redirect(route('login'));
        }
    }
}
