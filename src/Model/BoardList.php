<?php
namespace Planit\Client\Model;

class BoardList
{
    protected $id;
    protected $board_id;
    protected $name;
    protected $icon;
    protected $description;
    protected $order_key;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getBoardId()
    {
        return $this->board_id;
    }

    public function setBoardId($board_id)
    {
        $this->board_id = $board_id;
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

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
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

    public function getOrderKey()
    {
        return $this->order_key;
    }

    public function setOrderKey($order_key)
    {
        $this->order_key = $order_key;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])
        ->setName($data['name'])
        ->setBoardId($data['board_id'])
        ->setDescription($data['description'])
        ->setIcon($data['icon'])
        ->setOrderKey($data['order_key']);
    }
}
