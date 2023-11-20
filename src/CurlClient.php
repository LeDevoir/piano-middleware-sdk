<?php

namespace LeDevoir\PianoMiddlewareSDK;

/**
 * HTTP JSON cURL client
 */
class CurlClient
{
    /**
     * @param string $url
     * @param int $port
     * @param array $queryParams
     * @param array $data
     * @param array $headers
     * @param array $options
     * @return array
     */
    protected function post(
        string $url,
        int $port,
        array $queryParams = [],
        array $data = [],
        array $headers = [],
        array $options = []
    ): array {
        try {
            $curl = curl_init();

            curl_setopt_array($curl,
                [
                    CURLOPT_URL => sprintf(
                        '%s?%s',
                        $url,
                        http_build_query($queryParams)
                    ),
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
                    CURLOPT_TIMEOUT => $options[CURLOPT_TIMEOUT] ?? 10,
                    CURLOPT_CONNECTTIMEOUT => $options[CURLOPT_CONNECTTIMEOUT] ?? 5,
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