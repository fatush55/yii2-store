<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Img</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Title</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Price</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Quntity</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($cart['products'] as $product): ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $imagePath . $product['img'] ?> </td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $product['title'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $product['price'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?= $product['qnt'] ?></td>
        </tr>
        <?php  endforeach; ?>
    </tbody>

    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Count</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Sum</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $cart['count'] ?></td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?= $cart['sum'] ?></td>
    </tr>
    </tbody>
</table>
