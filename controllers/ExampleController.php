<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


/**
 * CountryController implements the CRUD actions for country model.
 * Code by Rick
 */

class ExampleController extends Controller
{
  public function actionSay($message = 'Rick')
  {
    echo "Hello $message";
    exit;
  }
}
?>