<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

class SignUpRequest extends Request
{
    private const TASK_NAME = 'sign_up';

    public function __construct(
        string $email,
        string $from
    ){
        parent::__construct(
            self::TASK_NAME,
            $from,
            compact('email')
        );
    }
}