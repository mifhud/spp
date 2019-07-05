<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property string $nis
 * @property int $user_id
 * @property string $nama
 * @property string $telepon
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $wali
 * @property string $email_wali
 * @property int $kelas_id_kelas
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property Pembayaran[] $pembayarans
 * @property Kelas $kelasIdKelas
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nis', 'user_id', 'kelas_id_kelas'], 'required'],
            [['user_id', 'kelas_id_kelas', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nis'], 'string', 'max' => 10],
            [['nama', 'telepon', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'wali', 'email_wali'], 'string', 'max' => 45],
            [['nis'], 'unique'],
            [['kelas_id_kelas'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kelas_id_kelas' => 'id_kelas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nis' => 'NIS',
            'user_id' => 'User',
            'nama' => 'Nama',
            'telepon' => 'Telepon',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'wali' => 'Wali',
            'email_wali' => 'Email Wali',
            'kelas_id_kelas' => 'Kelas Id Kelas',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::className(), ['siswa_nis' => 'nis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasIdKelas()
    {
        return $this->hasOne(Kelas::className(), ['id_kelas' => 'kelas_id_kelas']);
    }
}
