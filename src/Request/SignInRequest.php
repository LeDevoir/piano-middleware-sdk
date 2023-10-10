<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

class SignInRequest extends Request
{
    private const TASK_NAME = 'sign_in';

    public function __construct(
        string $email,
        string $uid,
        string $from
    ){
        parent::__construct(
            self::TASK_NAME,
            $from,
            compact('email', 'uid')
        );
    }
}