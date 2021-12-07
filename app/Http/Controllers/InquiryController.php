<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{

    
    public function store(Request $r)
    {
        if(Auth::guard('admin')->check() || Auth::guard('user')->check()) {
            if(Auth::guard('admin')->check()) {
                $type = 'admin';
                $id = Auth::guard('admin')->user()->id;
            } else {
                $type = 'user';
                $id = Auth::guard('user')->user()->id;
            }
            $Validator = Validator::make($r->all(),[
                'text' => 'required'
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
            ]);

            if ($Validator->fails()) {
                return response()->json(['errors' => [$Validator->errors()]]);
            }

            $content = nl2br($r->text);
            $inquiry = new Inquiry();
            $inquiry->type = $type;
            if($type == 'admin')
                $inquiry->admin_id = $id;
            else
                $inquiry->user_id = $id;
            $inquiry->text = $content;
            $inquiry->save();
            $inquiries = Inquiry::where('id',$inquiry->id)->get();
            $view = view('common.inquiries',compact('inquiries'))->render();

            return response()->json(['html' => $view]);

        } else {
            return redirect()->route('error');
        }
        

    }

    
    public function show(Request $r)
    {
        //
    }

   
    public function update(Request $r)
    {
        if(Auth::guard('admin')->check() || Auth::guard('user')->check()) { 
            if(is_numeric($r->id)) {
                $Validator = Validator::make($r->all(),[
                    'text' => 'required'
                ],[
                    'required' => 'ممنوع ترك الحقل فارغاَ',
                ]);
    
                if ($Validator->fails()) {
                    return response()->json(['errors' => [$Validator->errors()]]);
                }

                $inquiry = Inquiry::find($r->id);
                $content = nl2br($r->text);
                $inquiry->text = $content;
                $inquiry->save();
                return response()->json(['text' => $inquiry->text]);
            }
        }

    }

    
    public function destroy(Request $r)
    {
        if(Auth::guard('admin')->check() || Auth::guard('user')->check()) { 
            if(is_numeric($r->id)) {
                $inquiry = Inquiry::find($r->id);
                foreach($inquiry->replies as $r) {
                    $reply = Reply::find($r->id);
                    $reply->delete();
                }
                $inquiry->delete();
                return response()->json(['inquiry_id' => $inquiry->id]);
            }
        }

    }
}
