<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '留言审核', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => '是否删除该条留言?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            //'create_time:datetime',
            [
                'attribute'=>'create_time',
                'format'=>['date','php:Y-m-d H:i:s']
            ],
            //'userid',
            [
                'attribute'=>userid,
                'value'=>$model->user->username,
            ],
        ],
    ]) ?>

</div>
