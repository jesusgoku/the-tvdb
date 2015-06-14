<?php

namespace JesusGoku\TheTvDb;

/**
 * Class Language
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class Language
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $abbreviaton;

    public function __construct(\SimpleXMLElement $el)
    {
        $this->id = (string) $el->id;
        $this->name = (string) $el->name;
        $this->abbreviaton = (string) $el->abbreviation;
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
    public function getAbbreviaton()
    {
        return $this->abbreviaton;
    }

    /**
     * @param string $abbreviaton
     *
     * @return $this
     */
    public function setAbbreviaton($abbreviaton)
    {
        $this->abbreviaton = $abbreviaton;

        return $this;
    }
}
