<?php

namespace NotificationChannels\Pushinator\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response)
    {
        return new static("Failed to send a notification.");
    }
}
