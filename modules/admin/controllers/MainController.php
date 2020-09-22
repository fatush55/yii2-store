<?php


namespace app\modules\admin\controllers;


use app\models\User;
use app\modules\admin\models\Category;
use app\modules\admin\models\Order;
use app\modules\admin\models\Product;
use Yii;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $this->view->title = Yii::$app->name;
        $product = Product::find()->count();
        $order = Order::find()->count();
        $category = Category::find()->count();
        $user = User::find()->count();
        return $this->render('index', compact('order', 'product', 'category', 'user'));
    }
}