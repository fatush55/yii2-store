<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;

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
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
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
}
