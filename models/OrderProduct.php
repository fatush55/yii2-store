<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_product".
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property string|null $title
 * @property float|null $price
 * @property int|null $qnt
 * @property float|null $sum
 *
 * @property Order $order
 */
class OrderProduct extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'qnt', 'price', 'sum', 'title'], 'required'],
            [['order_id', 'product_id', 'qnt'], 'integer'],
            [['price', 'sum'], 'number'],
            [['title'], 'string', 'max' => 256],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'title' => 'Title',
            'price' => 'Price',
            'qnt' => 'Qnt',
            'sum' => 'Sum',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }


    public function saveOrderProduct(array $products, int $order_id)
    {
        foreach ($products as $key => $product) {
            $this->id = null;
            $this->isNewRecord = true;
            $this->order_id = $order_id;
            $this->product_id = $product['id'];
            $this->title = $product['title'];
            $this->price = $product['price'];
            $this->qnt = $product['qnt'];
            $this->sum = $product['qnt'] * $product['price'];
            if (!$this->save()) return false;
        }
        return true;
    }
}
