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
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     */
    public function setAbbreviaton($abbreviaton)
    {
        $this->abbreviaton = $abbreviaton;
    }
}
