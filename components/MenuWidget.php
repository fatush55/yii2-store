<?php

namespace app\components;

use app\models\Category;
use Yii;
use yii\base\Widget;

/**
 *
 * @property array $menuItem
 */
class MenuWidget extends Widget
{
    public $tmp;
    public $ul_class;
    public $tree;

    public function init()
    {
        parent::init();
        if ($this->tmp === null) {
            $this->tmp = 'menu';
        }
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        $this->tmp = $this->tmp . '.php';
    }

    public function run()
    {
        $cache = Yii::$app->cache->get('menu');
        if (!$cache) {
            $data = Category::getCategoryForMenu();
            $this->tree = self::setTree($data);
            $cache = $this->setMenuHtml();
            Yii::$app->cache->set('menu', $cache, 10);
        }
        return $cache;
    }

    protected static function setTree(array $categories): array
    {
        foreach ($categories as $key => $category) {
            if ($category['parent_id'] == 0) continue;
            $categories[$category['parent_id']]['children'][$key] = $category;
            unset($categories[$key]);
        }
        return $categories;
    }

    protected function setMenuHtml(): string
    {
        $html = '<ul class="' . $this->ul_class .'">';
        foreach ($this->tree as $item ) {
            $html .= $this->setMenuItem($item);
        }
        $html .= '</ul>';
        return $html;
    }

    protected function setMenuItem(array $item ): string {
        ob_start();
        include  __DIR__ . '/view/menu/' . $this->tmp;
        return ob_get_clean();
    }
}