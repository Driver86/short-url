<?php

namespace app\api\v1\controllers;

use app\api\v1\models\Link;
use Yii;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LinkController extends Controller
{
    public $enableCsrfValidation = false;

    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return parent::beforeAction($action);
    }

    public function actionView($id)
    {
        $link = Link::findOne($id);
        if (!$link) {
            throw new NotFoundHttpException();
        }
        return [
            'url' => $link->url,
            'clicks' => $link->clicks,
        ];
    }

    public function actionCreate()
    {
        $link = new Link();
        if ($link->load(Yii::$app->request->post()) and $link->save()) {
            return [
                'url' =>  Url::to(['site/link', 'id' => $link->id], true),
            ];
        }
        throw new BadRequestHttpException();
    }
}
