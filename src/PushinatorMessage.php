<?php

namespace NotificationChannels\Pushinator;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;

class PushinatorMessage extends Notification
{
    protected $message;
    protected $channel_id;

    public function __construct(string $message, string $channel_id)
    {
        $this->message = $message;
        $this->channel_id = $channel_id;
    }

    public function via($notifiable)
    {
        return [PushinatorChannel::class];
    }

    public function toPushinator($notifiable) {
        return [
            'message' => $this->message,
            'channel_id' => $this->channel_id
        ];
    }
}
