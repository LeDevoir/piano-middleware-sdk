<?php

namespace LeDevoir\PianoMiddlewareSDK;

use LeDevoir\PianoMiddlewareSDK\Request\LogoutRequest;
use LeDevoir\PianoMiddlewareSDK\Request\RefreshTokenRequest;
use LeDevoir\PianoMiddlewareSDK\Request\Request;
use LeDevoir\PianoMiddlewareSDK\Request\SignInRequest;
use LeDevoir\PianoMiddlewareSDK\Request\SignUpRequest;
use LeDevoir\PianoMiddlewareSDK\Responses\AccessTokenResponse;
use LeDevoir\PianoMiddlewareSDK\Responses\LogoutResponse;

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
     * @param SignInRequest $request
     * @return AccessTokenResponse
     */
    public function signIn(SignInRequest $request): AccessTokenResponse
    {
        return new AccessTokenResponse(
            $this->post(
                $this->baseUrl,
                $this->port,
                ['code' => $this->accessCode],
                $request->toArray(),
                [
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_CONNECTTIMEOUT => 10
                ]
            )
        );
    }

    /**
     * @param SignUpRequest $request
     * @return AccessTokenResponse
     */
    public function signUp(SignUpRequest $request): AccessTokenResponse
    {
        return new AccessTokenResponse(
            $this->post(
                $this->baseUrl,
                $this->port,
                ['code' => $this->accessCode],
                $request->toArray(),
                [
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_CONNECTTIMEOUT => 10
                ]
            )
        );
    }

    /**
     * @param RefreshTokenRequest $request
     * @return AccessTokenResponse
     */
    public function refreshToken(RefreshTokenRequest $request): AccessTokenResponse
    {
        return new AccessTokenResponse(
            $this->post(
                $this->baseUrl,
                $this->port,
                ['code' => $this->accessCode],
                $request->toArray(),
                [
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_CONNECTTIMEOUT => 10
                ]
            )
        );
    }

    public function logout(LogoutRequest $request): LogoutResponse
    {
        return new LogoutResponse(
            $this->post(
                $this->baseUrl,
                $this->port,
                ['code' => $this->accessCode],
                $request->toArray(),
                [
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_CONNECTTIMEOUT => 10
                ]
            )
        );
    }
}