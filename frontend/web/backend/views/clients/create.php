<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ActionTypes */

$this->title = 'Create Action Types';
$this->params['breadcrumbs'][] = ['label' => 'Action Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
