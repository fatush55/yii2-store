<?php

namespace app\modules\admin\models;

use app\models\OrderProduct;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $qnt
 * @property float $sum
 * @property int|null $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string|null $note
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qnt', 'name', 'email', 'phone', 'address'], 'required'],
            [['qnt', 'status'], 'integer'],
            [['sum'], 'number'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 256],
        ];
    }


    /**
     * Gets query for [[OrderProducts]].
     *
     * @return ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }
}
