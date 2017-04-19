<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MessageAttachment */

$this->title = 'Create Message Attachment';
$this->params['breadcrumbs'][] = ['label' => 'Message Attachments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-attachment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
