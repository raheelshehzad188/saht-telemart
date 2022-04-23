<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Newsletter;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.master');
    }
    public function subcribe_newsletter(Request $request)
    {
        $check_email=Newsletter::where('email',$request->email)->first();
        if(isset($check_email)){
            return redirect()->back()->with([
                'msg'=>'This Email Address already Exists',
                'msg_type'=>'error',
            ]);
        }

        $Newsletter=new Newsletter();
        $Newsletter->email=$request->email;
        $Newsletter->created_at=Date('Y-m-d h:i:s');
        $Newsletter->updated_at=Date('Y-m-d h:i:s');
        $Newsletter->save();
        return redirect()->back()->with([
            'msg'=>'Thanks for Subcribing Newsletter',
            'msg_type'=>'success',
        ]);
    }
}
