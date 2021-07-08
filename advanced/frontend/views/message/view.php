<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '留言板', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url(http://www.p.com/44.jpg) no-repeat;
            background-size: cover;
        }
    </style>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-success" role="alert">留言已提交，等待博主审核通过。</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            //'status',
            [
                'attribute'=>'status',
                'value'=>$model->status0->name,
            ],
            'create_time:datetime',
            //'userid',
            [
                'attribute'=>'userid',
                'value'=>$model->user->username,
            ],
        ],
    ]) ?>

</div>
