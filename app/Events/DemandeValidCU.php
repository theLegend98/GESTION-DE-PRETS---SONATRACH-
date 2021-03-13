<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DemandeValidCU implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $demande;
    public $text;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($demande,$text)
    {
        $this->$text=$text;
        $this->$demande=$demande;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs(){
        return 'Demande_ValidCU';
    }
}
