<?php

use common\models\User;
use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $up common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($up, 'picture')->widget(\trntv\filekit\widget\Upload::classname(), [
            'url'=>['avatar-upload']
        ]) ?>
        <?php echo $form->field($up, 'firstname')->textInput(['maxlength' => 255]) ?>
        <?php echo $form->field($up, 'middlename')->textInput(['maxlength' => 255]) ?>
        <?php echo $form->field($up, 'lastname')->textInput(['maxlength' => 255]) ?>
        <?php echo $form->field($up, 'locale')->dropDownlist(Yii::$app->params['availableLocales']) ?>
        <?php echo $form->field($up, 'gender')->dropDownlist([
            UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
            UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
        ]) ?>

        <?php echo $form->field($model, 'username') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo $form->field($model, 'password')->passwordInput() ?>
        <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
        <div class="form-group field-userform-roles">
            <label class="control-label">Роль</label>
            <input type="hidden" name="UserForm[roles]" value="">
                <div id="userform-roles">
                    <?php if (Yii::$app->user->can('administrator')){ ?><div class="checkbox"><label><input type="checkbox" name="UserForm[roles][]" value="administrator"> Админ</label></div><?php } ?>
                    <?php if (Yii::$app->user->can('administrator')){ ?><div class="checkbox"><label><input type="checkbox" name="UserForm[roles][]" value="manager"> Менеджер</label></div><?php } ?>
                    <?php if (Yii::$app->user->can('manager')){ ?><div class="checkbox"><label><input type="checkbox" name="UserForm[roles][]" value="user"> Клиент</label></div><?php } ?>
                </div>
            <p class="help-block help-block-error"></p>
        </div>
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
