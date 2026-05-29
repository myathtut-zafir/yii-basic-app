<?php

use app\models\Monstertest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MonstertestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Monstertestssssssss';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name'=>'description','content'=>'Monstertestsssssssss']);
$this->registerJsFile('@web/js/monstertest.js', ['position' => \yii\web\View::POS_END]); //this is for js file
?>
<div class="monstertest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Monstertest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'age',
            'gender',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Monstertest $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
