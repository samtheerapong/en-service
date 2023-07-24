<?php

use backend\modules\repair\models\RepairPriority;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
use backend\modules\repair\models\Department;
use backend\modules\repair\models\RepairTeam;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\Repair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="repair-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <div class="row">
                <?= $form->field($model, 'ticket_number')->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'ref')->hiddenInput()->label(false); ?>

                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'details')->textarea(['rows' => 3]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'requester_name')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(User::find()->all(), 'thai_name', 'thai_name'),
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                            // 'required' => 'required',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'request_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => [
                                'placeholder' => Yii::t('app', 'Select...'),
                                // 'required' => true,
                            ],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true,
                            ]
                        ]
                    ); ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'department_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Department::find()->all(), 'id', 'name'),
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                            // 'required' => true,
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'repair_team_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(RepairTeam::find()->all(), 'id', 'name'),
                        'options' => [
                            'placeholder' => Yii::t('app', 'Select...'),
                            // 'required' => true,
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>



                <div class="col-md-4">
                    <?= $form->field($model, 'repair_priority_id')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(RepairPriority::find()->all(), 'id', 'name'),
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'docs[]')->widget(FileInput::class, [
                        'options' => [
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            'initialPreview' => $model->initialPreview($model->docs, 'docs', 'file'),
                            'initialPreviewConfig' => $model->initialPreview($model->docs, 'docs', 'config'),
                            'allowedFileExtensions' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'odt', 'ods', 'jpg', 'png', 'jpeg'],
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                            'overwriteInitial' => false
                        ]
                    ]); ?>
                </div>

                <?= $form->field($model, 'repair_status_id')->hiddenInput()->label(false); ?>


            </div>
            <div class="card-footer">
                <div class="form-group">
                    <div class="d-grid gap-2">
                        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>