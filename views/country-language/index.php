<?php

use app\models\CountryLanguage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CountryLanguageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Country Languages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-language-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country Language', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CountryCode',
            'Language',
            'IsOfficial',
            'Percentage',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CountryLanguage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CountryCode' => $model->CountryCode, 'Language' => $model->Language]);
                 }
            ],
        ],
    ]); ?>
</div>
