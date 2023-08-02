<?php
namespace common\widgets\sweetalert;

class Notification extends NotificationBase
{
 
    public function run()
    {
        if (in_array($this->type, $this->types)){
            return $this->view->registerJs("swal ( \"{$this->title}\" ,  \"{$this->message}\" ,  \"{$this->type}\" );");
        }

        return $this->view->registerJs("swal ( \"{$this->title}\" ,  \"{$this->message}\" ,  \"{$this->typeDefault}\" );");
    }
}