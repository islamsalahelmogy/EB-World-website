<?php

namespace App\Http\Controllers;

use App\Events\CommentNotification;
use App\Models\Reply;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
class ReplyController extends Controller
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
            $reply = new Reply();
            $reply->type = $type;
            if($type == 'admin')
                $reply->admin_id = $id;
            else
                $reply->user_id = $id;
            $reply->text = $content;
            $reply->inquire_id = $r->id;
            $reply->save();

            $notify = new Notification();
            $authtype = $reply->Inquiry->type;
            $notify->auth_type = $authtype;
            if($authtype == 'admin') {
                $owner_id = $reply->Inquiry->admin_id;
                $notify->admin_id = $reply->Inquiry->admin_id;
            }
            else {
                $owner_id = $reply->Inquiry->user_id;
                $notify->user_id = $reply->Inquiry->user_id;
            }

            $notify->type = 'Comment';
            $array = [
                'user' => $type == 'user' ? Auth::guard('user')->user() : Auth::guard('admin')->user(),
                'Reply' => $reply,
            ];
            $notify->data = json_encode($array);
            $notify->save();
    
            $data = [
                'n_id' => $notify->id,
                'owner_id' => $owner_id,
                'auth_type' => $authtype,
                'inquiry_id' => $r->id,
                'type' => 'Comment',
                'user' => $type == 'user' ? Auth::guard('user')->user() : Auth::guard('admin')->user(),
            ];
            broadcast(new CommentNotification($data))->toOthers();
            
            $reply = Reply::where('id',$reply->id)->first();
            $count = Inquiry::find($r->id)->replies->count();
            $view = view('common.replies',compact('reply'))->render();

            return response()->json(['html' => $view,'count'=>$count]);

        } else {
            return redirect()->route('error');
        }
        

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

                $reply = Reply::find($r->id);
                $content = nl2br($r->text);
                $reply->text = $content;
                $reply->save();
                return response()->json(['text' => $reply->text]);
            }
        }

    }

    
    public function destroy(Request $r)
    {
        if(Auth::guard('admin')->check() || Auth::guard('user')->check()) { 
            if(is_numeric($r->id)) {
                $reply = Reply::find($r->id);
                $inquiry_id = $reply->Inquiry->id;
                $notify = Notification::all();
                foreach($notify as $n) {
                    if($n->type == "Comment") {
                        if(json_decode($n->data)->Reply->id == $reply->id)
                            $n->delete();
                    } 
                }
                $reply->delete();
                $count = Inquiry::find($inquiry_id)->replies->count();
                return response()->json(['inquiry_id' => $inquiry_id,'count' => $count]);
            }
        }

    }
}
