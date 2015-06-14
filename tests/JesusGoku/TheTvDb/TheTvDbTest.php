<?php

namespace JesusGoku\TheTvDb;

use JesusGoku\TheTvDb\TheTvDb;
use JesusGoku\TheTvDb\Models\Language;
use JesusGoku\TheTvDb\Models\Banner;
use JesusGoku\TheTvDb\Models\Actor;

/**
 * Class TheTvDbTest
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class TheTvDbTest extends \PHPUnit_Framework_TestCase
{
    /** @var TheTvDb */
    private $api;

    public function __construct()
    {
        $this->api = new TheTvDb(THE_TV_DB_API_KEY);
    }

    public function testSearch()
    {
        $tvShows = $this->api->search('Game of Thrones');
        $this->assertEquals('121361', $tvShows[0]->getId());

        $tvShows = $this->api->search('Suits');
        $this->assertEquals('247808', $tvShows[0]->getId());
    }

    public function testTvShowByImdbId()
    {
        $tvShow = $this->api->getTvShowByImdbId('tt0944947');

        $this->assertEquals(121361, $tvShow->getId());
    }

    public function testLanguages()
    {
        $languages = $this->api->getLanguages();

        $this->assertTrue($languages[0] instanceof Language);
    }

    public function testBanners()
    {
        $banners = $this->api->getBanners(121361);

        $this->assertTrue($banners[0] instanceof Banner);
    }

    public function testTvShow()
    {
        $tvShow = $this->api->getTvShow(121361);

        $this->assertEquals(121361, $tvShow->getId());
    }

    public function testActors()
    {
        $actors = $this->api->getActors(121361);

        $this->assertTrue($actors[0] instanceof Actor);
    }

    public function testEpisode()
    {
        $episode = $this->api->getEpisode(3254641);

        $this->assertEquals(3254641, $episode->getId());
    }

    public function testEpisodeByDefault()
    {
        $episode = $this->api->getEpisodeByDefault(121361, 1, 1);

        $this->assertEquals(3254641, $episode->getId());
    }

    public function testEpisodeByDvd()
    {
        $episode = $this->api->getEpisodeByDvd(121361, 1, 1);

        $this->assertEquals(3254641, $episode->getId());
    }

    public function testEpisodeByAbsolute()
    {
        $episode = $this->api->getEpisodeByAbsolute(121361, 1);

        $this->assertEquals(3254641, $episode->getId());
    }
}
