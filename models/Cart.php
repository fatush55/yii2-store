<?php


namespace app\models;

use yii\base\Model;


class Cart extends Model
{
    public static function addCart($product, $qnt = 1)
    {
        if (isset($_SESSION['cart']['products'][$product->id])) {
            $_SESSION['cart']['products'][$product->id]['qnt'] = $_SESSION['cart']['products'][$product->id]['qnt'] + $qnt;
        } else {
            $_SESSION['cart']['products'][$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'img' => $product->img,
                'price' => ceil($product->discount) ? $product->discount : $product->price,
                'qnt' => $qnt,
            ];
        }

        $_SESSION['cart']['count'] = isset($_SESSION['cart']['count']) ? $_SESSION['cart']['count'] + $qnt : $qnt;
        $_SESSION['cart']['sum'] = isset($_SESSION['cart']['sum'])
            ? $_SESSION['cart']['sum'] + ($qnt * (ceil($product->discount) ? $product->discount : $product->price))
            : $qnt * (ceil($product->discount) ? $product->discount : $product->price);
    }

    public static function recount($product)
    {
        $qnt = $_SESSION['cart']['products'][$product->id]['qnt'];
        $sum = $_SESSION['cart']['products'][$product->id]['price'] * $qnt;

        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - $sum;
        $_SESSION['cart']['count'] = $_SESSION['cart']['count'] - $qnt;

        unset($_SESSION['cart']['products'][$product->id]);
    }

    public static function countUp($product, $qnt = 1)
    {
        if ($_SESSION['cart']['products'][$product->id]['qnt'] === 10) return;
        $_SESSION['cart']['products'][$product->id]['qnt'] = $_SESSION['cart']['products'][$product->id]['qnt'] + $qnt;
        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] + $_SESSION['cart']['products'][$product->id]['price'];
        $_SESSION['cart']['count'] = $_SESSION['cart']['count'] + $qnt;
    }

    public static function countDown($product, $qnt = 1)
    {
        $_SESSION['cart']['products'][$product->id]['qnt'] = $_SESSION['cart']['products'][$product->id]['qnt'] - $qnt;
        $_SESSION['cart']['sum'] = $_SESSION['cart']['sum'] - $_SESSION['cart']['products'][$product->id]['price'];
        $_SESSION['cart']['count'] = $_SESSION['cart']['count'] - $qnt;

        if ($_SESSION['cart']['products'][$product->id]['qnt'] == 0) {
            unset($_SESSION['cart']['products'][$product->id]);
        }
    }
}