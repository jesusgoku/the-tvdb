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

    /** @var string */
    private $baseUrl = 'http://thetvdb.com/api/';

    /** @var string */
    private $language = 'en';

    /** @var Client */
    private $client;

    public function __construct($apiKey, array $config = array())
    {
        $this->apiKey = $apiKey;

        if (isset($config['baseUrl'])) $this->baseUrl = $config['baseUrl'];
        if (isset($config['language'])) $this->language = $config['language'];

        var_dump($this->baseUrl);
        $this->client = new Client(array(
            'base_uri' => $this->baseUrl,
        ));
    }

    public function search($q)
    {
        $res = $this->client->get('http://thetvdb.com/api/GetSeries.php', array(
            'query' => array(
                'seriesname' => $q,
                'language' => $this->language,
            ),
        ));

        $xml = simplexml_load_string((string) $res->getBody());

        $tvShows = array();
        foreach ($xml->Series as $serie) {
            $tvShows[] = new TvShow($serie);
        }

        return $tvShows;
    }
}
