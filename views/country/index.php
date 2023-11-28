<?php

use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CountrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Code' => $model->Code]);
                 }
            ],
            //['class' => 'yii\grid\SerialColumn'],
            'Code',
            //Naam
            ['label'=>'Naam',
            'attribute' => 'Name',
            'contentOptions' => ['style' => 'color: black; font-weight: bold; ']],
            //Hoofdstad
            [ 'label' => 'Hoofdstad',
            'attribute' => 'Capital',
            'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
            'format' => 'raw',
            'value' => function($data) {
                  return HTML::a('Naar hoofdstad',['/city/index', 'CitySearch[ID]'=> $data -> Capital]);
            }],
            //'Continent',
            //'Region',
            //'IndepYear',
            //Inwoner
            [ 'label' => 'Inwoners',
            'attribute' => 'Population',
            'contentOptions' => ['style' => 'width:30px; white-space: normal;']],
            [
                'label' => 'Oppervlakte',
                'attribute' => 'SurfaceArea',
                'format' => 'raw',
                'value' => function($data) {
                    // return 'hello';
                    return sprintf("%8d k&#13217", $data->SurfaceArea);
                }
            ],
            //'LifeExpectancy',
            //'GNP',
            //'GNPOld',
            //'LocalName',
            //'GovernmentForm',
            //'HeadOfState',

            //'Code2',

        ],
    ]); ?>
        <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
