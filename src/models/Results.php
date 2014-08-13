<?php

namespace app\models;

use Yii;
use yii\db\Command;
use yii\db\Connections;

/**
 * This is the model class for table "results".
 *
 * @property integer $id_result
 * @property integer $num
 * @property integer $count
 * @property integer $id_exp
 *
 * @property Experement $idExp
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'count', 'id_exp'], 'required'],
            [['num', 'count', 'id_exp'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_result' => 'Id Result',
            'num' => 'Num',
            'count' => 'Count',
            'id_exp' => 'Id Exp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiment()
    {
        return $this->hasOne(Experement::className(), ['id_exp' => 'id_exp']);
    }

    public function createResults($id, $throws){
        $resultNumber = array("2"=>0,"3"=>0,"4"=>0,"5"=>0,"6"=>0,"7"=>0,"8"=>0,"9"=>0,"10"=>0,"11"=>0,"12"=>0);
                for ($i=1; $i<=$throws; $i++){
                    $a=rand(1, 6);
                    $b=rand(1, 6);
                        foreach ($resultNumber as $key =>$value){
                            if (($a+$b)==$key){
                                $resultNumber[$key]+=1;
                            }
                        }
                    }
            function createQuery($id, $resultNumber){
                foreach ($resultNumber as $key => $value){
                    $res[] = [$id, $key, $value];
                    }
                    return $res;
                }
        $query = createQuery($id, $resultNumber);
        $connection = \Yii::$app->db;
        $connection->createCommand()->batchInsert("results", ["id_exp", "num", "count"], $query)->execute();
    }
//-----------------------------------------------------------------------
    public function getPercentage() {
        $totalCount = $this->experiment->throws;
        return ($totalCount > 0) ? ($this->count / $totalCount) : 0;
    }
//-----------------------------------------------------------------------
}
