<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id_kelas
 * @property string $nama
 * @property int $tingkat_id_tingkat
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property Tingkat $tingkatIdTingkat
 * @property Siswa[] $siswas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tingkat_id_tingkat'], 'required'],
            [['tingkat_id_tingkat', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['nama'], 'string', 'max' => 45],
            [['tingkat_id_tingkat'], 'exist', 'skipOnError' => true, 'targetClass' => Tingkat::className(), 'targetAttribute' => ['tingkat_id_tingkat' => 'id_tingkat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kelas' => 'Id Kelas',
            'nama' => 'Nama',
            'tingkat_id_tingkat' => 'Tingkat Id Tingkat',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatIdTingkat()
    {
        return $this->hasOne(Tingkat::className(), ['id_tingkat' => 'tingkat_id_tingkat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(Siswa::className(), ['kelas_id_kelas' => 'id_kelas']);
    }
}
