<?php

use backend\models\User;
use backend\modules\repair\models\Department;
use backend\modules\repair\models\Repair;
use backend\modules\repair\models\RepairPriority;
use backend\modules\repair\models\RepairStatus;
use backend\modules\repair\models\RepairTeam;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
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
                    'pager' => [
                        'class' => LinkPager::class,
                        'options' => ['class' => 'pagination justify-content-center'],
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        [
                            'attribute' => 'ticket_number',
                            'format' => 'html',
                            'options' => ['style' => 'width:140px'],
                            'value' => function ($model) {
                                return Html::a($model->ticket_number, ['view', 'id' => $model->id]);
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
                            'options' => ['style' => 'width:auto'],
                            'value' => function ($model) {
                                return $model->title;
                            },
                        ],
                        // 'details:ntext',
                        //'created_at',
                        //'updated_at',
                        [
                            'attribute' => 'requester_name',
                            'format' => 'html',
                            'options' => ['style' => 'width:150px'],
                            'value' => function ($model) {
                                return $model->requester_name;
                            },
                        ],
                        // 'department_id',
                        [
                            'attribute' => 'department_id',
                            'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->department->color . ';"><b>' . $model->department->code . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'department_id',
                                'data' => ArrayHelper::map(Department::find()->all(), 'id', 'code'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        // 'repair_team_id',
                        [
                            'attribute' => 'repair_team_id',
                            'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->repairTeam->color . ';"><b>' . $model->repairTeam->code . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'repair_team_id',
                                'data' => ArrayHelper::map(RepairTeam::find()->all(), 'id', 'code'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        //'updated_by',
                        [
                            'attribute' => 'repair_priority_id',
                            'options' => ['style' => 'width:100px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                $blinkClass = $model->repairPriority->id == 2 ? 'blink' : '';
                                return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->repairPriority->color . ';"><b>' . $model->repairPriority->name . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'repair_priority_id',
                                'data' => ArrayHelper::map(RepairPriority::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        [
                            'attribute' => 'repair_status_id',
                            'options' => ['style' => 'width:100px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                $blinkClass = $model->repairStatus->id == 1 ? 'blink' : '';
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
                            'headerOptions' => ['style' => 'width: 120px;'],
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