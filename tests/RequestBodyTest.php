<?php

namespace LeDevoir\PianoMiddlewareSDK\Tests;

use LeDevoir\PianoMiddlewareSDK\Request\SignInRequest;
use LeDevoir\PianoMiddlewareSDK\Request\SignUpRequest;
use PHPUnit\Framework\TestCase;

class RequestBodyTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function signInBody()
    {
        $request = new SignInRequest(
            'bogus@ledevoir.com',
            'asdfasdf-asdfasdf-asdfasdf-asdfasdf',
            'cms'
        );

        $unserialized = $request->toArray();
        $this->assertEquals('cms', $unserialized['from']);
        $this->assertEquals('asdfasdf-asdfasdf-asdfasdf-asdfasdf', $unserialized['content']['uid']);
        $this->assertEquals('bogus@ledevoir.com', $unserialized['content']['email']);

        $serialized = $request->toJSON();
        $json = <<<JSON
{"task":"sign_in","content":{"email":"bogus@ledevoir.com","uid":"asdfasdf-asdfasdf-asdfasdf-asdfasdf"},"from":"cms"}
JSON;

        $this->assertEquals($json, $serialized);
    }

    /**
     * @test
     */
    public function signUpBody()
    {
        $request = new SignUpRequest(
            'very_obscure_machine',
            'bogus@ledevoir.com'
        );

        $unserialized = $request->toArray();
        $this->assertEquals('very_obscure_machine', $unserialized['from']);
        $this->assertEquals('bogus@ledevoir.com', $unserialized['content']['email']);

        $serialized = $request->toJSON();
        $json = <<<JSON
{"task":"sign_up","content":{"email":"bogus@ledevoir.com"},"from":"very_obscure_machine"}
JSON;

        $this->assertEquals($json, $serialized);
    }
}