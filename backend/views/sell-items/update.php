<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SellItems */

$this->title = 'Update Sell Items: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sell Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sell-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
