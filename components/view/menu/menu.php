<?php

use yii\helpers\Url;

?>

<li <?= isset($item['children']) ? 'class="dropdown"' : '' ?>>
    <a
        href="<?= Url::to(['category/view', 'slug' => $item['slug']] ) ?>"
        <?= isset($item['children']) ? 'class="dropdown-toggle" data-toggle="dropdown"' : '' ?>
    >
        <?= $item['title'] ?>
        <?= isset($item['children']) ? '<span class="caret"></span>' : '' ?>
    </a>
    <?php if (isset($item['children'])): ?>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?php foreach ($item['children'] as $elem): ?>
                        <?= $this->setMenuItem($elem) ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</li>