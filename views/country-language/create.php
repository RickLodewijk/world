<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CountryLanguage $model */

$this->title = 'Create Country Language';
$this->params['breadcrumbs'][] = ['label' => 'Country Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-language-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
