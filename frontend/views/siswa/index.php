<?php
use backend\models\Siswa;


echo ("NIS :".Siswa::find()->where(['user_id' => Yii::$app->user->id])->one()->nis);