<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InquiryNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $admin_id;
    public $inquiry_id;
    public $type;    //inquiry_notify
    public $n_id;

    public function __construct($data=[])
    {
        $this->user=$data['user'];
        $this->admin_id = $data['admin_id'];
        $this->inquiry_id=$data['inquiry_id'];
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
        return new Channel('inquiry-notify-'.$this->admin_id);  
    }
    public function broadcastAs()
    {
        return 'inquiryNotify'; 
    }
}
