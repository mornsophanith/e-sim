<?php
namespace App\GuzzleHttp;

class Helper {

    private static $instance;

    private $token;
    private $uri;

 	public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new Helper();
        }
        return static::$instance;
    }

    function getClient($token = null) {
        return new \GuzzleHttp\Client([
            'base_uri' => $this->uri,
            'headers' => [
                'content-type' => 'application/json',
                'authorization' => 'Bearer ' . $token
                ]
            ]);
    }

    function setToken($token) {
        $this->token = $token;
    }

    function getToken() {
        return $this->token;
    }

    function setURI($uri) {
        $this->uri = $uri;
    }

    function getURI() {
        return $this->uri;
    }
}
