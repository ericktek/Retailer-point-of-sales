<?php

namespace app\models;

use Yii;

class Sale extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'sale';
    }

    public function rules()
    {
        return [
            [['totalPrice', 'totalQuantity', 'totalItems'], 'required'],
            [['totalPrice'], 'number'],
            [['totalQuantity', 'totalItems'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'totalPrice' => 'Total Price',
            'totalQuantity' => 'Total Quantity',
            'totalItems' => 'Total Items',
        ];
    }
}
