<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

    public function actionView($slug)
    {
        $product = Product::findOne(['slug' => $slug]);

        if (empty($product)) {
            throw new NotFoundHttpException("Product \"{$slug}\" not found");
        }

        return $this->render('view', compact('product'));
    }

}