<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Sells */

$this->title = 'Create Sells';
$this->params['breadcrumbs'][] = ['label' => 'Sells', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sells-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
