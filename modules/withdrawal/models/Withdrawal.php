<?php

namespace app\modules\withdrawal\models;

use Yii;
use app\modules\inventory\models\Inventory;

/**
 * This is the model class for table "master.withdrawal".
 *
 * @property string $accession_no
 * @property integer $lot_no
 * @property string $seed_ref_no
 * @property string $date
 * @property string $purpose
 */
class Withdrawal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.withdrawal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accession_no', 'seed_ref_no'], 'string'],
            [['date'], 'safe'],
            [['amount'], 'integer'],
            [['seed_ref_no', 'seed_si_ref_no'], 'required'],
            [['seed_si_ref_no'], 'exist', 'targetClass' => 'app\modules\inventory\models\Inventory', 'targetAttribute' => 'seedref_no', 'message' => 'Seed Ref does not exist in the Inventory records.'],
            ['amount', 'checkAmount'],
            [['accession_no', 'seed_ref_no', 'purpose', 'type', 'date', 'amount'], 'required']
        ];
    }

   public function checkAmount($attribute, $params){
        $seed_ref_no = $this->seed_si_ref_no;
        $refno = Inventory::findOne(array('seedref_no'=>$seed_ref_no)); 
        if($refno){
            $totalA = $refno->packets_active_no;
            $totalB = $refno->packets_base_no;
            $text1A = $totalA > 1 ? 'are' : 'is';
            $text2A = $totalA > 1 ? 'packets' : 'packet';
            $text1B = $totalB > 1 ? 'are' : 'is';
            $text2B = $totalB > 1 ? 'packets' : 'packet';
            if($totalA>0){ //if active inventory is still greater than zero
                if($this->type==1){ //active    
                    if($this->amount > $totalA){
                        return $this->addError($attribute, 'Cannot withdraw. Insufficient seeds in the Active Inventory. There '. $text1A . ' only ' . $totalA . ' '. $text2A . ' of seed left.');
                    }else{
                        if($this->amount == $totalA){
                            $refno->packets_active_no = 0;
                            $refno->save();
                            $refno->seed_weight_active = 0;
                            $refno->save();
                        }else{
                            $refno->packets_active_no = $refno->packets_active_no - $this->amount;
                            $refno->save();
                            $refno->seed_weight_active = $refno->packets_active_no * 35;
                            $refno->save();
                        }
                    }
                }else{
                    return $this->addError($attribute, 'Cannot withdraw. There '. $text1A . ' still ' . $totalA . ' '. $text2A . ' of seed available in the Active Inventory.');
                }
            }else{ //active is now zero, use base instead
                if($totalB>0){
                    if($this->type==2){ //base  
                        if($this->amount > $totalB){
                            return $this->addError($attribute, 'Cannot withdraw. Insufficient seeds in the Base Inventory. There '. $text1B . ' ' . $totalB . ' '. $text2B . ' of seed left.');
                        }else{
                            if($this->amount == $totalB){
                                $refno->packets_base_no = 0;
                                $refno->save();
                                $refno->seed_weight_base = 0;
                                $refno->save();
                            }else{
                                $refno->packets_base_no = $refno->packets_base_no - $this->amount;
                                $refno->save();
                                $refno->seed_weight_base = $refno->packets_base_no * 35;
                                $refno->save();
                            }
                        }
                    }else{
                        return $this->addError($attribute, 'Cannot withdraw. No packet of seed is left in the Active Inventory. Choose Base instead.');
                    }
                }else{
                    return $this->addError($attribute, 'Cannot withdraw. Insufficient seeds in the Base Inventory. There '. $text1B . ' ' . $totalB . ' '. $text2B . ' of seed left.');
                }
            }
        }else{
            return $this->addError($attribute, 'Cannot withdraw because Seed Ref '.$this->seed_ref_no.' does not exist in the Inventory.');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accession_no' => 'Accession No',
            'lot_no' => 'Lot No',
            'seed_ref_no' => 'Withdrawal Ref No',
            'seed_si_ref_no' => 'Seed Inventory Ref No',
            'date' => 'Date of Withdrawal',
            'amount' => 'Amount',
            'purpose' => 'Purpose',
        ];
    }
}
