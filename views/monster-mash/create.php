<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Monstermash $model */

$this->title = 'Create Monstermash';
$this->params['breadcrumbs'][] = ['label' => 'Monstermashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monstermash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
