<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = '留言填写';
$this->params['breadcrumbs'][] = ['label' => '留言板', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-create">

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url(http://www.p.com/44.jpg) no-repeat;
            background-size: cover;
        }
    </style>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
