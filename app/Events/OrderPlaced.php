<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderPlaced implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $order;

    public function __construct($order)
    {
        Log::info('OrderPlaced Fired', [
            'order_id' => $order->id
        ]);
        $this->order = $order;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('admin-orders'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'order.placed';
    }

}