<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

use stdClass;

class SignUpRequest extends Request
{
    private const TASK_NAME = 'sign_up';

    public function __construct(
        string $from,
        string $email
    ){
        parent::__construct(
            self::TASK_NAME,
            $from,
            compact('email')
        );
    }
}