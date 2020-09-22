<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $slug
 * @property int $category_id
 * @property string $title
 * @property float $price
 * @property float $discount
 * @property string $content
 * @property string|null $description
 * @property string|null $keywords
 * @property string $img
 * @property int|null $is_offer
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'price', 'discount', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['price', 'discount'], 'number'],
            [['content'], 'string'],
            [['slug', 'title', 'description', 'keywords', 'img'], 'string', 'max' => 256],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'price' => 'Price',
            'discount' => 'Discount',
            'content' => 'Content',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'is_offer' => 'Is Offer',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'ensureUnique' => true
            ]
        ];
    }

    public static function getOfferProduct(int $count = 4): array
    {
        return self::find()
            ->where(['is_offer' => 1])
            ->limit($count)
            ->asArray()
            ->all();
    }
}
