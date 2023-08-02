<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use dosamigos\gallery\Gallery;

/** @var yii\web\View $this */
/** @var backend\modules\repair\models\Repair $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repair'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="repair-view">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>

        </p>
    </div>

    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 250px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    // 'id',
                    [
                        'attribute' => 'repair_status_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            $blinkClass = $model->repairStatus->id == 1 ? 'blink' : '';
                            return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->repairStatus->color . ';"><b>' . $model->repairStatus->name . '</b></span>';
                        },
                    ],
                    [
                        'attribute' => 'repair_priority_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            $blinkClass = $model->repairPriority->id == 2 ? 'blink' : '';
                            return '<span class="badge ' . $blinkClass . '" style="background-color:' . $model->repairPriority->color . ';"><b>' . $model->repairPriority->name . '</b></span>';
                        },
                    ],
                    // 'ticket_number',
                    [
                        'attribute' => 'ticket_number',
                        'format' => 'html',
                        'value' => function ($model) {

                            return $model->ticket_number;
                        },
                    ],
                    'title',
                    'details:ntext',
                    // 'updated_at',
                    // 'created_by',
                    // [
                    //     'attribute' => 'created_by',
                    //     'format' => 'html',
                    //     'options' => ['style' => 'width:180px'],
                    //     'value' => function ($model) {
                    //         $user = $model->createdBy->thai_name;
                    //         return $user ? $model->createdBy->thai_name : $model->createdBy->username;
                    //     },
                    // ],
                    [
                        'attribute' => 'requester_name',
                        'format' => 'html',
                        'options' => ['style' => 'width:150px'],
                        'value' => function ($model) {
                            return $model->requester_name;
                        },
                    ],
                    [
                        'attribute' => 'department_id',
                        'options' => ['style' => 'width:80px'],
                        'contentOptions' => ['class' => 'text-center'],
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<span class="badge" style="background-color:' . $model->department->color . ';"><b>' . $model->department->code . '</b></span>';
                        },
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
                    ],
                    'request_date:date',
                    'created_at:date',
                    // 'updated_by',
                    // 'repair_priority_id',

                    'location',
                    // 'files:ntext',
                    // 'repair_status_id',
                    [
                        'attribute' => 'docs',
                        'format' => 'html',
                        'value' => $model->listDownloadFiles('docs')
                    ],
                ],
            ]) ?>



        </div>
    </div>
</div>