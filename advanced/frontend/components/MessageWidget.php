<?php
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;

class MessageWidget extends Widget
{
    public $recentMessages;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $messageString='';

        foreach ($this->recentMessages as $message)
        {
            $messageString.='<div class="post">'.
                '<div class="title">'.
                '<p style="color:black;font-style:normal;">'.
                nl2br($message->content).'</p>'.
                '<p class="text"> <span class="glyphicon glyphicon-user" aria-hidden="ture">
							</span> '.Html::encode($message->user->username).'</p>'.
                '<p class="text"> <span class="glyphicon glyphicon-time" aria-hidden="ture">
							</span> '.date('Y-m-d H:i:s',$message->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'</p>'.


                '<hr></div></div>';
        }
        return  $messageString;
    }
}