<?php

namespace JesusGoku\TheTvDb;

use JesusGoku\TheTvDb\TheTvDb;
use JesusGoku\TheTvDb\Language;

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

    public function testLanguages()
    {
        $languages = $this->api->getLanguages();

        $this->assertTrue($languages[0] instanceof Language);
    }
}
