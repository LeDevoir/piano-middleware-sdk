<?php

namespace LeDevoir\PianoMiddlewareSDK;

use LeDevoir\PianoMiddlewareSDK\Request\Request;

class Client
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
            sprintf(
                '%s?%s',
                $this->baseUrl,
                http_build_query(['code' => $this->accessCode])
            ),
            $this->port
        );
    }

    /**
     * Send a non-secure POST (no TLS)
     *
     * @param string $url
     * @param array $data
     * @param array $headers
     * @param int $port
     * @return array
     */
    private function post(
        string $url,
        int $port,
        array $data = [],
        array $headers = []
    ): array {
        try {
            $curl = curl_init();
            curl_setopt_array($curl,
                [
                    CURLOPT_URL => $url,
                    CURLOPT_PORT =>  $port,
                    CURLOPT_HTTPHEADER => array_merge(
                        [
                            'Content-Type: application/json',
                            'Accept: application/json'
                        ],
                        $headers
                    ),
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($data),
                    CURLOPT_TIMEOUT => 5,
                    CURLOPT_CONNECTTIMEOUT => 3,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false
                ]
            );

            $response = curl_exec($curl);
            if (!$response) {
                return [];
            }

            /**
             * If any unforeseen error occur or response code >= 400, return empty body
             * Error handling will need to be improved if we need to have a different business logic by error code or message
             */
            if (
                curl_errno($curl) ||
                curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400
            ) {
                return [];
            }

            return json_decode($response, true) ?? [];
        } finally {
            curl_close($curl);
        }
    }
}