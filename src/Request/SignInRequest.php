<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

class SignInRequest extends Request
{
    private const TASK_NAME = 'sign_in';

    public function __construct(
        string $email,
        ?string $uid,
        string $from
    ){
        $context = array_merge(
            compact('email'),
            $uid ? compact('uid') : []
        );

        parent::__construct(
            self::TASK_NAME,
            $from,
            $context
        );
    }
}