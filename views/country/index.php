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
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'text-align:right;'],
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Code' => $model->Code]);
                }
            ],
            //['class' => 'yii\grid\SerialColumn'],
            [
                'label' =>'Code',
                'attribute' => 'Code',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'text-align:right;'],
            ],
            // Naam
            [
                'label' => 'Naam',
                'attribute' => 'Name',
                'headerOptions' => [ 'style' => 'text-align:right; background-color:darkblue;' ],
                'contentOptions' => ['style' => 'color: black; font-weight: bold; text-align:right;'],
            ],
            // Hoofdstad
            [
                'label' => 'Hoofdstad',
                'attribute' => 'Capital',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                'contentOptions' => ['style' => 'text-align:right;'],
                'format' => 'raw',
                'value' => function ($data) {
                    return HTML::a('Naar hoofdstad', ['/city/index', 'CitySearch[ID]' => $data->Capital]);
                },
            ],
            // Inwoner
            [
                'label' => 'Inwoners',
                'attribute' => 'Population',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'width:30px; white-space: normal;'],
                'contentOptions' => ['style' => 'text-align:right;'],
                'value' => function ($data) {
                    $population = $data->Population;
                    if ($population <= 0) {
                        return 'onbewoond';
                    }
                    return number_format($population);
                },
            ],
            [
                'label' => 'Oppervlakte',
                'attribute' => 'SurfaceArea',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'text-align:right;'],
                'format' => 'raw',
                'value' => function ($data) {
                    return sprintf("%8d k&#13217", $data->SurfaceArea);
                },
            ],
            [
                'label' => 'Bevolkingsdichtheid',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'text-align:right;'],
                'format' => 'raw',
                'value' => function ($data) {
                    $population = $data->Population;
                    $surfaceArea = $data->SurfaceArea;
                    if ($surfaceArea > 0) {
                        $populationDensity = $population / $surfaceArea;
                        return round($populationDensity,2);
                    }
                    return 'Ongeldige oppervlakte'; // Een fallback als de oppervlakte nul is of niet beschikbaar.
                },
            ],
            //'Code2',
        ],
    ]) ?>
    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
