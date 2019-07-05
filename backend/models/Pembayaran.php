<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id
 * @property int $nominal
 * @property string $tanggal_bayar
 * @property string $siswa_nis
 * @property int $bulan
 * @property int $tahun
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property Siswa $siswaNis
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nominal', 'bulan', 'tahun', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tanggal_bayar'], 'safe'],
            [['siswa_nis'], 'required'],
            [['siswa_nis'], 'string', 'max' => 10],
            [['siswa_nis'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['siswa_nis' => 'nis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nominal' => 'Nominal',
            'tanggal_bayar' => 'Tanggal Bayar',
            'siswa_nis' => 'NIS',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaNis()
    {
        return $this->hasOne(Siswa::className(), ['nis' => 'siswa_nis']);
    }
}
