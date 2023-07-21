<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Documents Center';
?>
<div class="site-index">

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://images.pexels.com/photos/590037/pexels-photo-590037.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">For Admin</h5>
                    <p>User : admin <br>
                        Pass : admin123456</p>
                    <br>
                    <h5 class="card-title">For Demo</h5>
                    <p>User : demo <br>
                        Pass : demo123456</p>
                        <?= Html::a(Yii::t('app', 'เข้าใช้งาน'), ['documents/index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>


    <br>

    <div class="alert alert-info">
        <center>สอบถามการใช้งาน โทร 31 มือถือ 087-087-3830 Line ID = sam-it </center>
        <p>
            <center><img src="https://portfoliotheerapong.web.app/assets/img/qrcode-line.jpg" alt="https://portfoliotheerapong.web.app/assets/img/qrcode-line.jpg" width="400"></center>
        </p>
    </div>


</div>