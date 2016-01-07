<?php
namespace Planit\Client\Model;

class CardActivity
{
    protected $id;
    protected $card_id;
    protected $type;
    protected $created_at;
    protected $created_by;
    protected $message;
    protected $fieldname;
    protected $old_value;
    protected $new_value;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCardId()
    {
        return $this->card_id;
    }

    public function setCardId($card_id)
    {
        $this->card_id = $card_id;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getFieldname()
    {
        return $this->fieldname;
    }

    public function setFieldname($fieldname)
    {
        $this->fieldname = $fieldname;
        return $this;
    }

    public function getOldValue()
    {
        return $this->old_value;
    }

    public function setOldValue($old_value)
    {
        $this->old_value = $old_value;
        return $this;
    }

    public function getNewValue()
    {
        return $this->new_value;
    }

    public function setNewValue($new_value)
    {
        $this->new_value = $new_value;
        return $this;
    }

    public function fillData($data)
    {
        $this->setId($data['id'])
            ->setCardId($data['card_id'])
            ->setType($data['type'])
            ->setMessage($data['message'])
            ->setCreatedAt($data['created_at'])
            ->setCreatedBy($data['created_by'])
            ->setfieldname($data['fieldname'])
            ->setOldValue($data['old_value'])
            ->setNewValue($data['new_value']);
    }
}
