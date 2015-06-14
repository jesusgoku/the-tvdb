<?php

namespace JesusGoku\TheTvDb;


/**
 * Class Banner
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class Banner
{
    /** @var int */
    private $id;

    /** @var string */
    private $bannerPath;

    /** @var string */
    private $bannerType;

    /** @var string */
    private $bannerType2;

    /** @var string */
    private $language;

    /** @var int */
    private $season;

    /**
     * @param \SimpleXMLElement $el
     */
    public function __construct(\SimpleXMLElement $el)
    {
        $this->id = (int) $el->id;
        $this->bannerPath = (string) $el->BannerPath;
        $this->bannerType = (string) $el->BannerType;
        $this->bannerType2 = (string) $el->BannerType2;
        $this->language = (string) $el->Language;
        $this->season = (int) $el->Season;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getBannerPath()
    {
        return $this->bannerPath;
    }

    /**
     * @param string $bannerPath
     *
     * @return $this
     */
    public function setBannerPath($bannerPath)
    {
        $this->bannerPath = $bannerPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getBannerType()
    {
        return $this->bannerType;
    }

    /**
     * @param string $bannerType
     *
     * @return $this
     */
    public function setBannerType($bannerType)
    {
        $this->bannerType = $bannerType;

        return $this;
    }

    /**
     * @return string
     */
    public function getBannerType2()
    {
        return $this->bannerType2;
    }

    /**
     * @param string $bannerType2
     *
     * @return $this
     */
    public function setBannerType2($bannerType2)
    {
        $this->bannerType2 = $bannerType2;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return int
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param int $season
     *
     * @return $this
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }
}
