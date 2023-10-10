<?php

namespace LeDevoir\PianoMiddlewareSDK\Request;

use stdClass;

class Request
{
    /**
     * @var string
     */
    private $task;
    /**
     * @var stdClass
     */
    private $content;
    /**
     * @var string
     */
    private $from;

    public function __construct(
        string $task,
        stdClass $content,
        string $from
    ){
        $this->task = $task;
        $this->content = $content;
        $this->from = $from;
    }

    /**
     * @return false|string
     */
    public function toJSON()
    {
        return json_encode(
            [
                'task' => $this->task,
                'content' => $this->content,
                'from' => $this->from
            ]
        );
    }
}