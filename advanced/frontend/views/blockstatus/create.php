<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Blockstatus */

$this->title = 'Create Blockstatus';
$this->params['breadcrumbs'][] = ['label' => 'Blockstatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blockstatus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
