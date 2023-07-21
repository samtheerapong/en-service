<?php

use backend\models\Documents;
use backend\models\Categories;
use backend\models\Status;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\DocumentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Document'), ['create'], ['class' => 'btn btn-danger']) ?>
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
                        // 'prevPageLabel' => 'Previous',
                        // 'nextPageLabel' => 'Next',
                        'options' => ['class' => 'pagination justify-content-center'], // Adjust this class to center the pagination.
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'numbers',
                            'format' => 'html',
                            'options' => ['style' => 'width:180px'],
                            'contentOptions' => ['class' => 'text-center'],
                            'value' => function ($model) {
                                return Html::a($model->numbers, ['view', 'id' => $model->id]);
                            },
                        ],
                        // 'title',
                        [
                            'attribute' => 'title',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a($model->title, ['view', 'id' => $model->id]);
                            },
                        ],

                        [
                            'attribute' => 'categories_id',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                            'options' => ['style' => 'width:150px'],
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->categories->color . ';"><b>' . $model->categories->name . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'categories_id',
                                'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        // 'status_id',

                        [
                            'attribute' => 'status_id',
                            'format' => 'html',
                            'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                            'options' => ['style' => 'width:120px'],
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->status->color . ';"><b>' . $model->status->name . '</b></span>';
                            },
                            'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'status_id',
                                'data' => ArrayHelper::map(Status::find()->all(), 'id', 'name'),
                                // 'theme' => Select2::THEME_DEFAULT,
                                // 'theme' => Select2::THEME_KRAJEE,
                                'options' => ['placeholder' => Yii::t('app', 'Select...')],
                                'language' => 'th',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])
                        ],
                        //'ref',
                        // 'files:ntext',
                        [
                            'attribute' => 'expiration_date',
                            'label' => 'หมดอายุ',
                            'options' => ['style' => 'width:100px'],
                            'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                            'format' => 'html',
                            'value' => function ($model) {
                                $daysToExpiration = $model->getDaysToExpiration();
                                // ตรวจสอบว่าค่าน้อยกว่า 60 หรือไม่ ถ้าใช่ให้กำหนด CSS background-color เป็นสีแดง
                                $badgeColor = ($daysToExpiration < $model->document_date) ? '#FF1E00' : '#5BB318';
                                $style = 'text-align: center; color:#fff; background-color: ' . $badgeColor . ';';
                        
                                $options = [
                                    'class' => 'badge', // Change class to 'badge'
                                    'style' => $style,
                                ];
                        
                                return Html::tag('div', $daysToExpiration . ' วัน', $options); // Add 'days left' text to the badge
                            },
                            'filter' => false, // Disable search for this column
                        ],
                        [
                            'class' => ActionColumn::class,
                            'header' => 'จัดการ',
                            'headerOptions' => ['style' => 'width: 140px;'],
                            'contentOptions' => ['class' => 'text-center'], // จัดตรงกลาง
                            // 'headerOptions' => ['class' => 'btn btn-sm btn-outline-primary btn-group'],
                            'buttonOptions' => ['class' => 'btn btn-sm btn-outline-primary btn-group'],
                            'urlCreator' => function ($action, Documents $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>


            </div>
        </div>
    </div>
    

</div>