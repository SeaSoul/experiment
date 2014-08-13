<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "experement".
 *
 * @property integer $id_exp
 * @property string $data
 * @property string $time
 * @property string $name
 * @property string $bones_num
 * @property integer $throws
 *
 * @property Results[] $results
 */
class Experement extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'experement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'throws'], 'required'],
            [['throws'], 'integer'],
            [['name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_exp' => 'Id Exp',
            'data' => 'Data',
            'time' => 'Time',
            'name' => 'Name',
            'bones_num' => 'Bones Num',
            'throws' => 'Throws',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults() {
        return $this->hasMany(Results::className(), ['id_exp' => 'id_exp']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->data = date("m.d.y");
                $this->time = date("H:i:s");
                $this->bones_num = 'two';
                return true;
            }
        } else {
            return false;
        }
    }

}
