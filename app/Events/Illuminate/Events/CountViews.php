<?php

namespace App\Events\Illuminate\Events;

use App\Models\Lyric;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CountViews
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The lyric instance.
     *
     * @var \App\Models\Lyric
     */
    public $lyric;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Lyric $lyric)
    {
        $this->lyric = $lyric;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
