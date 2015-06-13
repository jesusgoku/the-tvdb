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

    public function __construct(\SimpleXMLElement $data)
    {
        $this->id = (string) $data->seriesid;
        $this->name = (string) $data->SeriesName;
        $this->overview = (string) $data->Overview;
        $this->firstAired = new \DateTime((string) $data->FirstAired);
        $this->imdbId = (string) $data->IMDB_ID;
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
}
