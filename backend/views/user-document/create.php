<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserDocument */

$this->title = 'Create User Document';
$this->params['breadcrumbs'][] = ['label' => 'User Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
