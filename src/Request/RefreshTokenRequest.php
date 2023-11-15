<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

class RefreshTokenRequest extends Request
{
    private const TASK_NAME = 'refresh_token';

    public function __construct(
        string $token,
        string $from
    ){
        parent::__construct(
            self::TASK_NAME,
            $from,
            compact('token')
        );
    }
}