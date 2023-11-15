<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

class LogoutRequest extends Request
{
    private const TASK_NAME = 'logout';

    public function __construct(
        string $accessToken,
        string $from
    ){
        parent::__construct(
            self::TASK_NAME,
            $from,
            compact('accessToken')
        );
    }
}