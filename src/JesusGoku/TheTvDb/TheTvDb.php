<?php

namespace JesusGoku\TheTvDb;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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

    /** @var Client */
    private $authClient;

    public function __construct($apiKey, array $config = array())
    {
        $this->apiKey = $apiKey;

        if (isset($config['baseUrl'])) $this->baseUrl = $config['baseUrl'];
        if (isset($config['language'])) $this->language = $config['language'];

        $this->client = new Client(array(
            'base_url' => $this->baseUrl,
            'defaults' => array(
                'headers' => array(
                    'Accept' => 'text/xml',
                ),
            ),
        ));

        $this->authClient = new Client(array(
            'base_url' => $this->baseUrl . $this->apiKey . '/',
            'defaults' => array(
                'headers' => array(
                    'Accept' => 'text/xml',
                ),
            ),
        ));
    }

    /**
     * @param string $q
     * @return TvShow[]
     */
    public function search($q)
    {
        $res = $this->client->get('GetSeries.php', array(
            'query' => array(
                'seriesname' => $q,
                'language' => $this->language,
            ),
        ));

        $xml = $res->xml();

        $tvShows = array();
        foreach ($xml->Series as $serie) {
            $tvShows[] = new TvShow($serie);
        }

        return $tvShows;
    }

    public function getLanguages()
    {
        $res = $this->authClient->get('languages.xml');

        $xml = $res->xml();

        $languages = array();
        foreach ($xml->Language as $language) {
            $languages[] = new Language($language);
        }

        return $languages;
    }
}
