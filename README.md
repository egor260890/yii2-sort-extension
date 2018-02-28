yii2-sort-extension
===================
yii2-sort-extension

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist egor260890/yii2-sort-extension "*"
```

or add

```
"egor260890/yii2-sort-extension": "*"
```

to the require section of your `composer.json` file.


Usage
-----

В модели подключить трейт и реализовать 2 метода:

```php

use egor260890\sort\Sort;

class myclass{
    use Sort;
    
    protected function getSortAttribute(): string
        {
            return 'sort_id';
        }
    
        protected function getSortGroupAttributes(): array
        {
            return [];
        }

}


```

В gridview

```php

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ...,
            ...,
            ...,
            [
                'class' => 'egor260890\sort\widgets\gridview\MoveColumn',
                'pjaxContainerSelector'=>'#new-container',
                'method'=>'products/move'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    

```

Пример метода в контроллере

```php
    public function actionMove($id,$action){
            try {
                $model=Products::findOne($id);
                $model->move($action);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
```


