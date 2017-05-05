<?php

namespace app\modules\regeneration\models;

use Yii;
use app\modules\inventory\models\Inventory;

/**
 * This is the model class for table "master.regeneration".
 *
 * @property string $accession_no
 * @property integer $lot_no
 * @property string $seed_ref_no
 * @property string $date
 */
class Regeneration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.regeneration';
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
            [['accession_no', 'seed_ref_no', 'type', 'date', 'amount'], 'required']
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
            $partitionactive = round($this->amount/2);
            $partitionbase = $this->amount - $partitionactive;
            if($totalB<=0){ //if base inventory is zero
                if($this->type==3){ //base    
                    
                            $refno->packets_base_no = $refno->packets_base_no + $partitionbase;
                            $refno->save();
                            $refno->seed_weight_base = $refno->packets_base_no * 35;
                            $refno->save();
                            $refno->packets_active_no = $refno->packets_active_no + $partitionactive;
                            $refno->save();
                            $refno->seed_weight_active = $refno->packets_active_no * 35;
                            $refno->save();

                }else{
                        return $this->addError($attribute, 'Cannot add. No packet of seed is left in the Base Inventory. Choose Base instead.');
                }
            }
            else{
                if($this->type==1){ //active  
                        
                            $refno->packets_active_no = $refno->packets_active_no + $this->amount;
                            $refno->save();
                            $refno->seed_weight_active = $refno->packets_active_no * 35;
                            $refno->save();
                }elseif($this->type==2){ //base    
                    
                            $refno->packets_base_no = $refno->packets_base_no + $this->amount;
                            $refno->save();
                            $refno->seed_weight_base = $refno->packets_base_no * 35;
                            $refno->save();
                }else{ //active and base    
                    
                            $refno->packets_base_no = $refno->packets_base_no + $partitionbase;
                            $refno->save();
                            $refno->seed_weight_base = $refno->packets_base_no * 35;
                            $refno->save();
                            $refno->packets_active_no = $refno->packets_active_no + $partitionactive;
                            $refno->save();
                            $refno->seed_weight_active = $refno->packets_active_no * 35;
                            $refno->save();
                }
            }
        }
        else{
            return $this->addError($attribute, 'Cannot add because Seed Ref '.$this->seed_si_ref_no.' does not exist in the Inventory.');
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
            'seed_ref_no' => 'Regeneration Reference No',
            'seed_si_ref_no' => '(Inventory) Reference No', //original label = Seed Inventory Ref No
            'date' => 'Date of Regeneration',
            'amount' => 'Amount',
        ];
    }
}
