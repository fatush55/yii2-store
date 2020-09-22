<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($slug)
    {
        $category = Category::findOne(['slug' => $slug]);
        if (empty($category)){
            throw new NotFoundHttpException('This pages is not found (:');
        }

        $products = Product::find()->where(['category_id' => $category->id]);
        $pages = new Pagination(
            [
                'totalCount' => $products->count(),
                'pageSize' => 4,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ]
        );
        $products = $products->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta("{$category->title}::" . Yii::$app->name, $category->description, $category->keywords);

        return $this->render('view', compact('category', 'products', 'pages'));
    }

    public function actionSearch()
    {
        $q = Yii::$app->request->get('q');

        if (!$q) {
            return $this->render('search', compact('q' ));
        }

        $products = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination(
            [
                'totalCount' => $products->count(),
                'pageSize' => 4,
                'forcePageParam' => false,
                'pageSizeParam' => false,
            ]
        );
        $products = $products->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta("Search - {$q}::" . Yii::$app->name);

        return $this->render('search', compact('q', 'products', 'pages'));
    }

}
