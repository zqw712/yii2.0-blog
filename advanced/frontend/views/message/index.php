<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\MessageWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言板';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url(http://www.p.com/44.jpg) no-repeat;
            background-size: cover;
        }
    </style>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <div class="messagebox">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新留言
            </li>
            <li class="list-group-item">
                <?= MessageWidget::widget(['recentMessages'=>$recentMessages])?>
            </li>
        </ul>
    </div>



    <p>
        <?= Html::a('我要留言', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
</div>
