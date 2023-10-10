<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

use stdClass;

class SignUpRequest extends Request
{
    private const TASK_NAME = 'sign_up';

    public function __construct(stdClass $content, string $from)
    {
        parent::__construct(
            self::TASK_NAME,
            $content,
            $from
        );
    }
}