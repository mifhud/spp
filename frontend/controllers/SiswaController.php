<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiswaController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
