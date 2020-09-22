<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php //dd($_SESSION['cart']) ?>
<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i><a href="<?= Yii::$app->homeUrl ?>">Home</a>
                <span>|</span></li>
            <li>Checkout</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?= $this->render('//layouts/include/site-bar') ?>
    <div class="w3l_banner_nav_right">
        <?= Alert::widget() ?>
        <!-- about -->
        <div class="privacy about">
            <h3>Chec<span>kout</span></h3>
            <?php if (!empty($data['products'])): ?>
                <div class="checkout-right">
                    <h4>Your shopping cart contains: <span class="count-prod-123"><?= $data['count'] ?></span> Products</h4>
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['products'] as $product): ?>
                            <tr class="rem1">
                                <td class="invert-image">
                                    <a href="single.html">
                                        <?= Html::img("@web/images/{$product['img']}",
                                            [
                                                'alt' => $product['title'],
                                            ]
                                        ) ?>
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus" data-id="<?= $product['id'] ?>">
                                                &nbsp;
                                            </div>
                                            <div class="entry value">
                                                <span><?= $product['qnt'] ?></span>
                                            </div>
                                            <div class="entry value-plus active" data-id="<?= $product['id'] ?>">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><?= $product['title'] ?></td>

                                <td class="invert"><?= $product['price'] ?></td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="remove_prod_of_checkout close1" data-id="<?= $product['id'] ?>"></div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="checkout-left">
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            <li style="color: #0f0f0f">
                                Count <i>-</i>
                                <span id="checkout-count"><?= $data['count'] ?></span>
                            </li>
                            <li style="color: #0f0f0f">
                                Total <i>-</i>
                                <span id="checkout-sum"><?= $data['sum'] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 address_form_agile">

                        <?php $form = ActiveForm::begin() ?>
                            <?= $form->field($order , 'name') ?>
                            <?= $form->field($order , 'email') ?>
                            <?= $form->field($order , 'phone') ?>
                            <?= $form->field($order , 'address') ?>
                            <?= $form->field($order , 'note')->textarea([]) ?>
                            <?= Html::submitButton('Buy', ['class' => 'submit check_out']) ?>
                        <?php  ActiveForm::end() ?>



<!--                        <div class="checkout-right-basket">-->
<!--                            <a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right"-->
<!--                                                                        aria-hidden="true"></span></a>-->
<!--                        </div>-->
                    </div>

                    <div class="clearfix"></div>

                </div>
            <?php endif; ?>
        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->