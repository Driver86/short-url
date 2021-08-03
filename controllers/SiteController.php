<?php

namespace app\controllers;

use app\api\v1\models\Link;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public function actionLink($id)
    {
        $link = Link::findOne($id);
        if (!$link) {
            throw new NotFoundHttpException();
        }
        $link->updateCounters(['clicks' => 1]);
        return $this->redirect($link->url);
    }
}
