<?php
    use yii\helpers\Html;
?>
<?php if (isset($data['products']) && !empty($data['products'])): ?>

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Img</th>
            <th scope="col">Count</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['products'] as $product): ?>
            <tr>
                <td>
                    <?=
                        Html::img("@web/images/{$product['img']}",
                            [
                                'alt' => $product['title'],
                                'class' => 'img_cart_product'
                            ]
                        )
                    ?>
                </td>
                <td><?= $product['title'] ?></td>
                <td><?= $product['price'] ?></td>
                <td>
                    <button class="down_prod_of_cart" data-id="<?= $product['id'] ?>">-</button>
                    <span><?= $product['qnt'] ?></span>
                    <button class="up_prod_of_cart" data-id="<?= $product['id'] ?>">+</button>
                </td>
                <td>
                    <div class="rem">
                        <div class="remove_prod_of_cart close1" data-id="<?= $product['id'] ?>"></div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td>Sum</td>
                <td id="sum-inside-cart"><?= $data['sum'] ?></td>
            </tr>
            <tr>
                <td>Count</td>
                <td id="count-inside-cart"><?= $data['count'] ?></td>
            </tr>
        </tbody>
    </table>
<?php else: ?>
    <div> Cart it is empty</div>
<?php endif; ?>