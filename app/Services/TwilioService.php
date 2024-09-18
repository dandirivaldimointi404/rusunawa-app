<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.token')
        );
    }

    public function sendWhatsAppMessage($to, $message)
    {
        return $this->client->messages->create(
            'whatsapp:' . $to,
            [
                'from' => 'whatsapp:+14155238886',
                'body' => $message
            ]
        );
    }
}
