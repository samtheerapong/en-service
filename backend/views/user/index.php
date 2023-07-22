<?php

use backend\models\User;
use kartik\widgets\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <p>
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-danger']) ?>
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
                        // 'username',
                        [
                            'attribute' => 'username',
                            'format' => 'html',
                            'options' => ['style' => 'width:140px'],
                            'value' => function ($model) {
                                return Html::a($model->username, ['view', 'id' => $model->id]);
                            },
                        ],
                        [
                            'attribute' => 'thai_name',
                            'label' => 'ชื่อ-สกุล',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a($model->thai_name, ['view', 'id' => $model->id]);
                            }
                        ],
                        'email:email',
                        // 'role',
                        [
                            'attribute' => 'role',
                            'format' => 'html',
                            'value' => function ($model) {
                                if ($model->role === 10) {
                                    return '<span class="badge" style="background-color:#0079FF">Admin</span>';
                                } elseif ($model->role === 5) {
                                    return '<span class="badge" style="background-color:#F86F03">Manager</span>';
                                } else {
                                    return '<span class="badge" style="background-color:#6528F7">User</span>';
                                }
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'role',
                                'data' => [
                                    10 => 'Admin',
                                    5 => 'Manager',
                                    1 => 'User',
                                ],
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                                                ],
                        [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                return $model->status === 10 ? '<span class="badge" style="background-color:green">Enable</span>' : '<span class="badge" style="background-color:red">Disable</span>';
                            },

                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'status',
                                'data' => [
                                    10 => 'Enable',
                                    9 => 'Disable',
                                ],
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
                            'urlCreator' => function ($action, User $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
</div>