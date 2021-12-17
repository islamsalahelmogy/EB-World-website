<?php

namespace App\Http\Controllers;

use App\Events\InquiryNotification;
use App\Models\Inquiry;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use App\Models\Admin;
use Illuminate\Support\Carbon;
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

            if($type == 'user') {
                $admins = Admin::all();
                foreach($admins as $admin) {
                    $notify = new Notification();
                    $notify->auth_type = 'admin';
                    $notify->admin_id = $admin->id;
                    $notify->type = 'Inquiry';
                    $array = [
                        'user' => Auth::guard('user')->user(),
                        'Inquiry' => $inquiry
                    ];
                    $notify->data = json_encode($array);
                    $notify->save();
            
                    $data = [
                        'n_id' => $notify->id,
                        'admin_id' => $admin->id,
                        'inquiry_id' => $inquiry->id,
                        'type' => 'Inquiry',
                        'user' => Auth::guard('user')->user(),
                    ];
                    broadcast(new InquiryNotification($data))->toOthers();
                }
            }
            
            $inquiries = Inquiry::where('id',$inquiry->id)->get();
            $view = view('common.inquiries',compact('inquiries'))->render();
            
            return response()->json(['html' => $view]);

        } else {
            return redirect()->route('error');
        }
        

    }

    
    public function show(Request $r)
    {
        if($r->n_id != null) {
            $notify = Notification::find($r->n_id);

            if($notify != null && $notify->read_at == null) {
                $notify->read_at = Carbon::now();
                $notify->save();
            }
        }
        $inquiries = Inquiry::where('id',$r->inquiry_id)->get();
        return view('app.showinquiry',compact('inquiries'));
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
                $notify = Notification::all();
                foreach($notify as $n) {
                    if($n->type == "Inquiry") { 
                        if(json_decode($n->data)->Inquiry->id == $inquiry->id)
                            $n->delete();
                    }
                   
                }
                $inquiry->delete();
                return response()->json(['inquiry_id' => $inquiry->id]);
            }
        }

    }
}
