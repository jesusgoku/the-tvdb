<?php

namespace JesusGoku\TheTvDb;


/**
 * Class Actor
 * @package JesusGoku\TheTvDb
 *
 * @author Jesus Urrutia <jesus.urrutia@gmail.com>
 */
class Actor
{
    /** @var int */
    private $id;

    /** @var string */
    private $image;

    /** @var string */
    private $name;

    /** @var string */
    private $role;

    /** @var int */
    private $sortOrder;

    /**
     * @param \SimpleXMLElement $el
     */
    public function __construct(\SimpleXMLElement $el)
    {
        $this->id = (int) $el->id;
        $this->image = (string) $el->Image;
        $this->name = (string) $el->Name;
        $this->role = (string) $el->Role;
        $this->sortOrder = (int) $el->SortOrder;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int $sortOrder
     *
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }
}
