<?php

namespace LeDevoir\PianoMiddlewareSDK\Responses;

class LogoutResponse
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Jti confirms logout has been successful
     *
     * @return string
     */
    public function getJti(): string
    {
        return $this->data['data']['jti'] ?? '';
    }
}