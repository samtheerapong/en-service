<?php

use backend\modules\itwork\models\WorkGroup;
use backend\modules\itwork\models\WorkPriority;
use backend\modules\itwork\models\WorkRecord;
use backend\modules\itwork\models\WorkStatus;
use backend\modules\itwork\models\WorkType;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\modules\itwork\models\WorkRecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Work Records');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-record-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Repair'), ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="card border-secondary">
        <div class="card-header text-white bg-primary">
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
                        'work_number',
                        // 'priority_id',
                        [
                            'attribute' => 'priority_id',
                            // 'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->workPriority->color . ';"><b>' . $model->workPriority->name . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'priority_id',
                                'data' => ArrayHelper::map(WorkPriority::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        // 'work_group_id',
                        [
                            'attribute' => 'work_group_id',
                            // 'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->workGroup->color . ';"><b>' . $model->workGroup->code . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'work_group_id',
                                'data' => ArrayHelper::map(WorkGroup::find()->all(), 'id', 'code'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        // 'work_type_id',
                        [
                            'attribute' => 'work_type_id',
                            // 'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->workType->color . ';"><b>' . $model->workType->code . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'work_type_id',
                                'data' => ArrayHelper::map(WorkType::find()->all(), 'id', 'code'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        'title',
                        //'description:ntext',
                        'start_date',
                        // 'end_date',
                        //'images:ntext',
                        //'docs:ntext',
                        //'member:ntext',
                        // 'cost',
                        // 'work_status_id',
                        [
                            'attribute' => 'work_status_id',
                            // 'options' => ['style' => 'width:80px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->workStatus->color . ';"><b>' . $model->workStatus->code . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'work_status_id',
                                'data' => ArrayHelper::map(WorkStatus::find()->all(), 'id', 'code'),
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
                            'urlCreator' => function ($action, WorkRecord $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>