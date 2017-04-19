<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SellItems */

$this->title = 'Create Sell Items';
$this->params['breadcrumbs'][] = ['label' => 'Sell Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sell-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
