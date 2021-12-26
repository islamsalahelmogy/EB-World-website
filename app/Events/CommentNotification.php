<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $owner_id;
    public $inquiry_id;
    public $auth_type;
    public $user;
    public $type;   //comment
    public $n_id;
    
    public function __construct($data=[])
    {
        $this->owner_id=$data['owner_id'];
        $this->auth_type = $data['auth_type'];
        $this->inquiry_id=$data['inquiry_id'];
        $this->user=$data['user'];
        $this->type=$data['type'];
        $this->n_id=$data['n_id'];

    
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if($this->auth_type == 'admin') {
            return new Channel('admin-inquiry-comment-'.$this->owner_id);   //comment-id owner
        } else {
            return new Channel('user-inquiry-comment-'.$this->owner_id);   //comment-id owner
        }
    }
    public function broadcastAs()
    {
        if($this->auth_type == 'admin') { 
            return 'adminInquiryComment';
        } else {
            return 'userInquiryComment';
        }
    }
}
