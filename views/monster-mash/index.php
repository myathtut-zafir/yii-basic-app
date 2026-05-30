<?php

use app\models\Monstermash;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\MonsterSearch $search */

$this->title = 'Monstermashes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monstermash-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Monstermash', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $this->render('_search', [
        'model' => $search,
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'age',
            'gender',
            'username',
            //'password',
            //'auth_key',
            [
                'class' => ActionColumn::class,
                 'visibleButtons' => [
                     'update' => function ($model,$key,$index) {
                         return Yii::$app->user->can('monstermash/update');
                     },
                 ],
                'urlCreator' => function ($action, Monstermash $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
