<?php


namespace app\controllers;


use app\models\Product;
use Yii;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $offer_product = Product::getOfferProduct();

        $session = Yii::$app->session;
        $session->open();
//        dd($session->get('cart'));

        return $this->render('index', compact('offer_product'));
    }


}