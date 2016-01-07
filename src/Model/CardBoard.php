<?php
namespace Planit\Client\Model;

class CardBoard
{
    protected $id;
    protected $board_id;
    protected $board_list_id;
    protected $board_name;
    protected $board_list_name;

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

    public function getBoardListId()
    {
        return $this->board_list_id;
    }

    public function setBoardListId($board_list_id)
    {
        $this->board_list_id = $board_list_id;
        return $this;
    }

    public function getBoardName()
    {
        return $this->board_name;
    }

    public function setBoardName($board_name)
    {
        $this->board_name = $board_name;
        return $this;
    }

    public function getBoardListName()
    {
        return $this->board_list_name;
    }

    public function setBoardListName($board_list_name)
    {
        $this->board_list_name = $board_list_name;
        return $this;
    }
    
    public function fillData($data)
    {
        $this->setId($data['id'])
            ->setBoardId($data['board_id'])
            ->setBoardName($data['board_name'])
            ->setBoardListId($data['board_list_id'])
            ->setBoardListName($data['board_list_name']);
    }
}
