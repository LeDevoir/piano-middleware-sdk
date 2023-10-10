<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

use stdClass;

class SignInRequest extends Request
{
    private const TASK_NAME = 'sign_in';

    public function __construct(stdClass $content, string $from)
    {
        parent::__construct(
            self::TASK_NAME,
            $content,
            $from
        );
    }
}