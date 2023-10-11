<?php

namespace LeDevoir\PianoMiddlewareSDK;

use LeDevoir\PianoMiddlewareSDK\Request\Request;

class MiddlewareClient extends CurlClient
{
    /**
     * @var string
     */
    private $baseUrl;
    /**
     * @var int
     */
    private $port;
    /**
     * @var string
     */
    private $accessCode;

    public function __construct(
        string $baseUrl,
        string $accessCode,
        int $port = 443
    ){
        $this->baseUrl = $baseUrl;
        $this->port = $port;
        $this->accessCode = $accessCode;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendRequest(Request $request): array
    {
        return $this->post(
            $this->baseUrl,
            $this->port,
            ['code' => $this->accessCode],
            $request->toArray()
        );
    }
}