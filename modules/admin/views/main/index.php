<?php //dd($product) ?>
<?php //dd($order) ?>
<?php //dd($category)
use yii\helpers\Url; ?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $order ?></h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?= Url::to(['order/index']) ?>" class="small-box-footer">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $product ?></h3>

                <p>Product</p>
            </div>
            <div class="icon">
                <i class="fa fa-globe"></i>
            </div>
            <a href="<?= Url::to(['product/index']) ?>" class="small-box-footer">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $category ?></h3>
                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="fa fa-th-list"></i>
            </div>
            <a href="<?= Url::to(['category/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $user ?></h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= Url::to(['user/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->

</div>
