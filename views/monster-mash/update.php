<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Monstermash $model */

$this->title = 'Update Monstermash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Monstermashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="monstermash-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
