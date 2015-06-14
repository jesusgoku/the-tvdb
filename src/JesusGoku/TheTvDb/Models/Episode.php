<?php

namespace JesusGoku\TheTvDb\Models;


/**
 * Class Episode
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class Episode extends AbstractModel
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $number;

    /** @var string */
    private $director;

    /** @var \DateTime */
    private $firstAired;

    /** @var string */
    private $language;

    /** @var string */
    private $overview;

    /** @var float */
    private $rating;

    /** @var int */
    private $ratingCount;

    /** @var int */
    private $season;

    /**
     * @param \SimpleXMLElement $el
     */
    public function __construct(\SimpleXMLElement $el)
    {
        $this->id = (int) $el->id;
        $this->name = (string) $el->EpisodeName;
        $this->overview = (string) $el->Overview;
        $this->number = (int) $el->EpisodeNumber;
        $this->director = (string) $el->Director;
        $this->firstAired = new \DateTime((string) $el->FirstAired);
        $this->language = (string) $el->Language;
        $this->rating = (float) $el->Rating;
        $this->ratingCount = (int) $el->RatingCount;
        $this->season = (int) $el->SeasonNumber;
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
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param string $director
     *
     * @return $this
     */
    public function setDirector($director)
    {
        $this->director = $director;

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
