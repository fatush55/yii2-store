<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
use app\models\Product;
use Yii;
use yii\db\Exception;
use yii\web\Response;

class CartController extends AppController
{
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        Cart::addCart($product);

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('modal-cart', ['data' => $session->get('cart')]);
        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('modal-cart', ['data' => $session->get('cart')]);
    }

    public function actionRemove($id)
    {
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        Cart::recount($product);
        return self::setJson($id);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        return $this->renderPartial('modal-cart');
    }

    public function actionCountUp($id)
    {
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        Cart::countUp($product);
        return self::setJson($id);
    }

    public function actionCountDown($id)
    {
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        Cart::countDown($product);
        return self::setJson($id);
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta("Prepare order :" . Yii::$app->name);

        $order = new Order();
        $orderProduct = new OrderProduct();
        $transaction = Yii::$app->getDb()->beginTransaction();

        if ($order->load(Yii::$app->request->post())) {
            $order->qnt = $session->get('cart')['count'];
            $order->sum = $session->get('cart')['sum'];

            if (!$order->save() || !$orderProduct->saveOrderProduct($session->get('cart')['products'], $order->id)) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error',  'Order mistake');
            } else {
                $transaction->commit();
                Yii::$app->session->setFlash('success',  'Order successful');

                try {
                    Yii::$app->mailer->compose('order', [
                        'cart' => $session->get('cart'),
                        'imagePath' => Yii::$app->homeUrl . 'images/'
                    ])
                        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                        ->setTo([$order->email, Yii::$app->params['adminEmail']])
                        ->setSubject('Тема сообщения!')
                        ->send()
                    ;
                } catch (\Swift_TransportException $e) {
                    Yii::warning($e);
                }

                $session->remove('cart');
                return $this->refresh();
            }
        }

        return $this->render('view', ['data' => $session->get('cart'), 'order' => $order]);
    }

    public static function setJson($id)
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = [
            'countProduct' => isset($_SESSION['cart']['products'][$id]['qnt']) ? $_SESSION['cart']['products'][$id]['qnt'] : 0,
            'count' => isset($_SESSION['cart']['count']) ? $_SESSION['cart']['count'] : 0,
            'sum' => isset($_SESSION['cart']['sum']) ? $_SESSION['cart']['sum'] : 0,
        ];
    }
}