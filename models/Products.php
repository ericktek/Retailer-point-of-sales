<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $qty
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'expense', 'qty', 'buying_price', 'selling_price'], 'required'],
            [['expense'], 'number'],
            [['buying_price'], 'number'],
            [['selling_price'], 'number'],
            [['qty'], 'integer'],
            [['name'], 'string', 'max' => 255],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'expense' => 'Expenses',
            'buying_price' => 'buying_price',
            'selling_price' => 'selling_price',
            'qty' => 'Qty',
        ];
    }
}
