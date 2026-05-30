<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MonstertestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="monstertest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?php //= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

<!--    --><?php //= $form->field($model, 'age') ?>

<!--    --><?php //= $form->field($model, 'gender') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
