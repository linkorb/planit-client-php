<?php
namespace Planit\Client\Model;

class Card
{
    protected $id;
    protected $name;
    protected $description;
    protected $details;
    protected $created_at;
    protected $created_by;
    protected $updated_at;
    protected $updated_by;
    protected $activities;
    protected $boards;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    public function getActivities()
    {
        return $this->activities;
    }

    public function setActivities($activities)
    {
        $this->activities = $activities;
        return $this;
    }

    public function getBoards()
    {
        return $this->boards;
    }

    public function setBoards($boards)
    {
        $this->boards = $boards;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])
        ->setName($data['name'])
        ->setDescription($data['description'])
        ->setDetails($data['details'])
        ->setCreatedAt($data['created_at'])
        ->setCreatedBy($data['created_by'])
        ->setUpdatedAt($data['updated_at'])
        ->setUpdatedBy($data['updated_by']);
    }
}
