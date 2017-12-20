<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

$id_course = Yii::$app->request->get('idcourse');

?>
<h1>course/create</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

	<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-schedule']); ?>

                <?=
                    $form->field($model, 'tanggal_mulai')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter date and time...'],
                    'pluginOptions' => [
                        'format'=>'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight'=>true,
                        'autoclose'=>true
                    ]
                    ]);
                ?>

                <?=
                    $form->field($model, 'tanggal_berakhir')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Enter date and time...'],
                    'pluginOptions' => [
                        'format'=>'yyyy-mm-dd hh:ii:ss',
                        'todayHighlight'=>true,
                        'autoclose'=>true
                    ]
                    ]);
                ?>

                <?= $form->field($model, 'text_info')->TextArea() ?>

                <?=
                    $form->field($model, 'id_course')->hiddenInput(['value'=> $id_course])->label(false);
                ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>