<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = '修改留言: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '留言审核', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
