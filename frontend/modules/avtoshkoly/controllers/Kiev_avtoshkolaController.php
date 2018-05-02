<?php
/**
 * Created by PhpStorm.
 * User: A0297
 * Date: 23.04.2018
 * Time: 15:39
 */

namespace frontend\modules\avtoshkoly\controllers;


use frontend\models\Avtoshkoly;
use yii\data\Pagination;

class Kiev_avtoshkolaController extends DefaultController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $avtoshkoly = Avtoshkoly::find()->where('city=1')->orderBy('rand()');
        $countQuery = clone $avtoshkoly;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 100]);
        $pages->pageSizeParam = false;
        $avtoshkoly = $countQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'avtoshkoly' => $avtoshkoly,
            'pages' => $pages,
        ]);
    }
}