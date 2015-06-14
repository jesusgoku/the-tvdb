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

    /**
     * @param string $apiKey
     * @param array $config
     */
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

    public function getTvShowByImdbId($id)
    {
        $res = $this->client->get('GetSeriesByRemoteID.php', array(
            'query' => array(
                'imdbid' => $id,
                'language' => $this->language,
            ),
        ));

        $xml = $res->xml();

        return new TvShow($xml->Series);
    }

    /**
     * @return Language[]
     */
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

    public function getTvShow($id)
    {
        $res = $this->authClient->get("series/{$id}/{$this->language}.xml");

        $xml = $res->xml();

        return new TvShow($xml->Series[0]);
    }

    /**
     * List of all the tv show banner
     *
     * @param int $id
     *
     * @return Banner[]
     */
    public function getBanners($id)
    {
        $res = $this->authClient->get('series/' . $id . '/banners.xml');

        $xml = $res->xml();

        $banners = array();
        foreach ($xml->Banner as $banner) {
            $banners[] = new Banner($banner);
        }

        return $banners;
    }

    /**
     * List of all of the tv show actors
     *
     * @param int $id
     *
     * @return Actor[]
     */
    public function getActors($id)
    {
        $res = $this->authClient->get('series/' . $id . '/actors.xml');

        $xml = $res->xml();

        $actors = array();
        foreach ($xml->Actor as $actor) {
            $actors[] = new Actor($actor);
        }

        return $actors;
    }

    /**
     * @param int $episodeId
     *
     * @return Episode
     */
    public function getEpisode($episodeId)
    {
        $res = $this->authClient->get("episodes/{$episodeId}/{$this->language}.xml");

        $xml = $res->xml();

        return new Episode($xml->Episode[0]);
    }

    /**
     * @param $tvShowId
     * @param $season
     * @param $episode
     *
     * @return Episode
     */
    public function getEpisodeByDefault($tvShowId, $season, $episode)
    {
        $res = $this->authClient->get("series/{$tvShowId}/default/{$season}/{$episode}/{$this->language}.xml");

        $xml = $res->xml();

        return new Episode($xml->Episode[0]);
    }

    /**
     * @param $tvShowId
     * @param $season
     * @param $episode
     *
     * @return Episode
     */
    public function getEpisodeByDvd($tvShowId, $season, $episode)
    {
        $res = $this->authClient->get("series/{$tvShowId}/dvd/{$season}/{$episode}/{$this->language}.xml");

        $xml = $res->xml();

        return new Episode($xml->Episode[0]);
    }

    /**
     * @param $tvShowId
     * @param $episode
     *
     * @return Episode
     */
    public function getEpisodeByAbsolute($tvShowId, $episode)
    {
        $res = $this->authClient->get("series/{$tvShowId}/absolute/{$episode}/{$this->language}.xml");

        $xml = $res->xml();

        return new Episode($xml->Episode[0]);
    }
}
