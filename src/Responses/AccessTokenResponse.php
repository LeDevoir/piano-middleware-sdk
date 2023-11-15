<?php

namespace LeDevoir\PianoMiddlewareSDK\Responses;

class AccessTokenResponse
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
     * @return string
     */
    public function getPianoUid(): string
    {
        return $this->data['data']['uid'] ?? '';
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->data['data']['access_token'] ?? '';
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->data['data']['refresh_token'] ?? '';
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->data['data']['expires_in'] ?? -1;
    }
}