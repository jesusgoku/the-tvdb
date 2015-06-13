<?php

namespace JesusGoku\TheTvDb;

use GuzzleHttp\Client;

/**
 * Class TheTvDb
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class TheTvDb
{
    /** @var string */
    private $apiKey;

    /** @var Client */
    private $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new Client();
    }
}
