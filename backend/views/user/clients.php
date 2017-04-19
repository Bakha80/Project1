<?php

use common\grid\EnumColumn;
use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Добавить клиента'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            array(
                'attribute'=>'firstname',
                'label' => 'Имя',
                'value'=>function ($model, $key, $index, $widget) {
                    return $model->userProfile->firstname;
                },
                'format'=>'raw'
            ),
            array(
                'attribute'=>'lastname',
                'label' => 'Фамилия',
                'value'=>function ($model, $key, $index, $widget) {
                    return $model->userProfile->lastname;
                },
                'format'=>'raw'
            ),
            array(
                'attribute'=>'mobile_number',
                'label' => 'Номер',
                'value'=>function ($model, $key, $index, $widget) {
                    return $model->userProfile->mobile_number;
                },
                'format'=>'raw'
            ),
            'email:email',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
