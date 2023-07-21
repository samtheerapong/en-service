<?php

use backend\models\User;
use backend\modules\repair\models\Repair;
use backend\modules\repair\models\RepairStatus;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\RepairSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Repair');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Repair'), ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        [
                            'attribute' => 'ticket_number',
                            'format' => 'html',
                            'options' => ['style' => 'width:140px'],
                            'value' => function ($model) {
                                return $model->ticket_number;
                            },
                        ],
                        [
                            'attribute' => 'request_date',
                            'format' => 'date',
                            'options' => ['style' => 'width:120px'],
                            'value' => function ($model) {
                                return $model->request_date;
                            },
                        ],
                        [
                            'attribute' => 'title',
                            'format' => 'html',
                            'options' => ['style' => 'width:300'],
                            'value' => function ($model) {
                                return $model->title;
                            },
                        ],
                        // 'details:ntext',
                        //'created_at',
                        //'updated_at',
                        [
                            'attribute' => 'created_by',
                            'format' => 'html',
                            'options' => ['style' => 'width:180px'],
                            'value' => function ($model) {
                                $user = $model->createdBy->thai_name;
                                return $user ? $model->createdBy->thai_name : $model->createdBy->username;
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'created_by',
                                'data' => ArrayHelper::map(User::find()->all(), 'id', 'thai_name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                       
                        //'updated_by',
                        //'repair_priority_id',
                        // [
                        //     'attribute' => 'location',
                        //     'format' => 'html',
                        //     'value' => function ($model) {
                        //         return $model->location;
                        //     },
                        // ],
                        //'files:ntext',
                        // [
                        //     'attribute' => 'repair_status_id',
                        //     'format' => 'html',
                        //     'value' => function ($model) {
                        //         return $model->repair_status_id;
                        //     },
                        // ],
                        [
                            'attribute' => 'repair_status_id',
                            'options' => ['style' => 'width:140px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                $blinkClass = $model->id == 1 ? 'blink' : '';
                                return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->repairStatus->color . ';"><b>' . $model->repairStatus->name . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'repair_status_id',
                                'data' => ArrayHelper::map(RepairStatus::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        [
                            'class' => ActionColumn::class,
                            'header' => 'จัดการ',
                            'headerOptions' => ['style' => 'width: 140px;'],
                            'buttonOptions' => ['class' => 'btn btn-sm btn-outline-primary btn-group'],
                            'urlCreator' => function ($action, Repair $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>