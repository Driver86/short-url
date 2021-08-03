<?php

namespace app\api\v1\models;

use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if ($insert) {
            do {
                $this->id = substr(strtr(\Yii::$app->security->generateRandomString(32), ['_' => '', '-' => '']), 0, 6);
            } while (static::find()->where(['id' => $this->id])->exists());
        }
        return true;
    }
}
