<?php

namespace JesusGoku\TheTvDb;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Cache\CacheStorage;
use GuzzleHttp\Subscriber\Cache\CacheStorageInterface;
use GuzzleHttp\Subscriber\Cache\CacheSubscriber;
use JesusGoku\TheTvDb\Models\Actor;
use JesusGoku\TheTvDb\Models\Banner;
use JesusGoku\TheTvDb\Models\Episode;
use JesusGoku\TheTvDb\Models\Language;
use JesusGoku\TheTvDb\Models\TvShow;

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

    /** @var CacheStorageInterface   */
    private $cacheStorage;

    /**
     * @param string $apiKey
     * @param array $config
     */
    public function __construct($apiKey, array $config = array())
    {
        $this->apiKey = $apiKey;

        if (isset($config['baseUrl'])) $this->baseUrl = $config['baseUrl'];
        if (isset($config['language'])) $this->language = $config['language'];

        $this->cacheStorage = $this->initCacheStorage(isset($config['cache']) ? $config['cache'] : null);

        $this->client = new Client(array(
            'base_url' => $this->baseUrl,
            'defaults' => array(
                'headers' => array(
                    'Accept' => 'text/xml',
                ),
                'debug' => true,
            ),
        ));

        $this->authClient = new Client(array(
            'base_url' => $this->baseUrl . $this->apiKey . '/',
            'defaults' => array(
                'headers' => array(
                    'Accept' => 'text/xml',
                ),
                'debug' => true,
            ),
        ));

        CacheSubscriber::attach($this->client, array('storage' => $this->cacheStorage));
        CacheSubscriber::attach($this->authClient, array('storage' => $this->cacheStorage));
    }

    /**
     * @param CacheStorageInterface|Cache|array|bool|null $cache
     * @return CacheStorageInterface
     */
    private function initCacheStorage($cache)
    {
        if ($cache instanceof CacheStorageInterface) {
            return $cache;
        } else if ($cache instanceof Cache) {
            return new CacheStorage($cache);
        } else if (is_array($cache) && isset($cache['folder'])) {
            return new CacheStorage(
                new FilesystemCache(
                    $cache['folder'],
                    isset($cache['prefix']) ? $cache['prefix'] : 'thetvdb-'
                )
            );
        } else if (null === $cache || $cache) {
            return new CacheStorage(
                new FilesystemCache(sys_get_temp_dir()),
                'thetvdb-'
            );
        }

        throw new \InvalidArgumentException('Invalid cache config');
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
