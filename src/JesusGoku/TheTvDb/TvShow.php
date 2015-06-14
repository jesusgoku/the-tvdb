<?php

namespace JesusGoku\TheTvDb;


/**
 * Class TvShow
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class TvShow
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $overview;

    /** @var \DateTime */
    private $firstAired;

    /** @var string */
    private $imdbId;

    /** @var string */
    private $zap2itId;

    /** @var string */
    private $contentRating;

    /** @var string */
    private $language;

    /** @var string */
    private $network;

    /** @var float */
    private $rating;

    /** @var int */
    private $ratingCount;

    /** @var int */
    private $runtime;

    /** @var string */
    private $status;

    /** @var string */
    private $airsDayOfWeek;

    /** @var string */
    private $airsTime;

    /** @var \DateTime */
    private $lastUpdated;

    /** @var string */
    private $banner;

    /** @var string */
    private $fanArt;

    /** @var string */
    private $poster;

    public function __construct(\SimpleXMLElement $data)
    {
        $this->id = (string) $data->seriesid;
        $this->name = (string) $data->SeriesName;
        $this->overview = (string) $data->Overview;
        $this->firstAired = new \DateTime((string) $data->FirstAired);
        $this->imdbId = (string) $data->IMDB_ID;

        $this->contentRating = (string) $data->ContentRating;
        $this->language = (string) $data->Language;
        $this->network = (string) $data->Network;
        $this->rating = (float) $data->Rating;
        $this->runtime = (int) $data->Runtime;
        $this->status = (string) $data->Status;
        $this->airsDayOfWeek = (string) $data->Airs_DayOfWeek;
        $this->airsTime = (string) $data->Airs_Time;
        $this->ratingCount = (int) $data->RatingCount;
        $this->zap2itId = (string) $data->zap2it_id;
        if (isset($data->lastupdated)) {
            $this->lastUpdated = new \DateTime('@' . ((string) $data->lastupdated));
        }
        $this->banner = (string) $data->banner;
        $this->fanArt = (string) $data->fanart;
        $this->poster = (string) $data->poster;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     *
     * @return $this
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFirstAired()
    {
        return $this->firstAired;
    }

    /**
     * @param \DateTime $firstAired
     *
     * @return $this
     */
    public function setFirstAired($firstAired)
    {
        $this->firstAired = $firstAired;

        return $this;
    }

    /**
     * @return string
     */
    public function getImdbId()
    {
        return $this->imdbId;
    }

    /**
     * @param string $imdbId
     *
     * @return $this
     */
    public function setImdbId($imdbId)
    {
        $this->imdbId = $imdbId;

        return $this;
    }

    /**
     * @return string
     */
    public function getZap2itId()
    {
        return $this->zap2itId;
    }

    /**
     * @param string $zap2itId
     *
     * @return $this
     */
    public function setZap2itId($zap2itId)
    {
        $this->zap2itId = $zap2itId;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentRating()
    {
        return $this->contentRating;
    }

    /**
     * @param string $contentRating
     *
     * @return $this
     */
    public function setContentRating($contentRating)
    {
        $this->contentRating = $contentRating;

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
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param string $network
     *
     * @return $this
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return int
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * @param int $ratingCount
     *
     * @return $this
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * @param int $runtime
     *
     * @return $this
     */
    public function setRuntime($runtime)
    {
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getAirsDayOfWeek()
    {
        return $this->airsDayOfWeek;
    }

    /**
     * @param string $airsDayOfWeek
     *
     * @return $this
     */
    public function setAirsDayOfWeek($airsDayOfWeek)
    {
        $this->airsDayOfWeek = $airsDayOfWeek;

        return $this;
    }

    /**
     * @return string
     */
    public function getAirsTime()
    {
        return $this->airsTime;
    }

    /**
     * @param string $airsTime
     *
     * @return $this
     */
    public function setAirsTime($airsTime)
    {
        $this->airsTime = $airsTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     *
     * @return $this
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * @return string
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param string $banner
     *
     * @return $this
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * @return string
     */
    public function getFanArt()
    {
        return $this->fanArt;
    }

    /**
     * @param string $fanArt
     *
     * @return $this
     */
    public function setFanArt($fanArt)
    {
        $this->fanArt = $fanArt;

        return $this;
    }

    /**
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     *
     * @return $this
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }
}
