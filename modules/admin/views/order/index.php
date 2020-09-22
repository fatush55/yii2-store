<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
?>
<div class="order-index">

<!--    <p>-->
<!--        --><?//= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row"><div class="col-sm-6"></div>
            <div class="col-sm-6"></div></div>
            <div class="row"><div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Show
                                <select name="example1_length" aria-controls="example1" class="form-control input-sm select_item_order">
                                    <option value="10" <?=$pageSize == 10 ? 'selected' : ''?>>10</option>
                                    <option value="25" <?=$pageSize == 25 ? 'selected' : ''?>>25</option>
                                    <option value="50" <?=$pageSize == 50 ? 'selected' : ''?>>50</option>
                                    <option value="100" <?=$pageSize == 100 ? 'selected' : ''?>>100</option>
                                </select> entries
                            </label>
                        </div>
                    </div>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'qnt',
                            'sum',
                            [
                                'label' => 'Статус',
                                'attribute' => 'status',
                                'filter' => ['0' => 'new', '1' => 'Successful'],
                            ],
                            'name',
                            //'email:email',
                            //'phone',
                            //'address',
                            //'note:ntext',
                            //'created_at',
                            //'updated_at',

                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => "
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-info icon_brn'>{view}</i></button>
                                    <button type='button' class='btn btn-warning icon_brn'>{update}</i></button>
                                    <button type='button' class='btn btn-danger icon_brn'>{delete}</i></button>
                                </div>",

                            ],
                        ],
                    ]); ?>
                </table>
            </div>
    </div>
    <!-- /.box-body -->
</div>
