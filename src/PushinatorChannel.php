<?php

namespace NotificationChannels\Pushinator;

use NotificationChannels\Pushinator\Exceptions\CouldNotSendNotification;
use Pushinator\PushinatorClient;
use Exception;
use Illuminate\Notifications\Notification;

class PushinatorChannel
{
    protected $pushinator_client;

    public function __construct(PushinatorClient $pushinator_client)
    {
        $this->pushinator_client = $pushinator_client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \NotificationChannels\Pushinator\PushinatorMessage $notification
     *
     * @throws \NotificationChannels\Pushinator\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {

        $data = $notification->toPushinator($notifiable);

        try {
            $this->pushinator_client->sendNotification($data['channel_id'], $data['message']);
        } catch (Exception $e) {
            throw new CouldNotSendNotification($e->getMessage(), $e->getCode(), $e);
        }
    }
}
