<?php

namespace Tap;

use Zttp\Zttp;
use Zttp\ZttpResponse;

class Client
{
    /**
     * @var string
     */
    protected $api_key;

    /**
     * @var string
     */
    protected $endpoint = 'https://trainandpredict.com/api';

    /**
     * @param string $api_key
     */
    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @param int $user_id
     * @param int $item_id
     * @return ZttpResponse
     */
    public function log(int $user_id, int $item_id): ZttpResponse
    {
        return Zttp::post($this->url("/log/{$user_id}/{$item_id}", [
            'api_key' => $this->api_key,
        ]));
    }

    /**
     * @param int $item_id
     * @return ZttpResponse
     */
    public function recommendationsForItem(int $item_id): ZttpResponse
    {
        return Zttp::get($this->url("/rec/item/{$item_id}", [
            'api_key' => $this->api_key,
        ]));
    }

    /**
     * @param int $user_id
     * @return ZttpResponse
     */
    public function recommendationsForUser(int $user_id): ZttpResponse
    {
        return Zttp::get($this->url("/rec/user/{$user_id}", [
            'api_key' => $this->api_key,
        ]));
    }

    /**
     * @param string $uri
     * @return string
     */
    protected function url(string $uri): string
    {
        return $this->endpoint . '/' . trim($uri, '/');
    }
}
