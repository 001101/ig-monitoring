<?php

use app\modules\admin\widgets\AccountProfileBox;
use app\modules\admin\widgets\CategoriesWidget;
use app\modules\admin\widgets\favorites\ProfileButton;
use app\modules\admin\widgets\InvalidAccountAlert;
use app\modules\admin\widgets\NotesSideWidget;
use app\modules\admin\widgets\OnOffMonitoringButton;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Account */

$formatter = Yii::$app->formatter;

?>
<?php if (!$model->is_valid): ?>
    <?= InvalidAccountAlert::widget([
        'model' => $model,
    ]) ?>
<?php endif; ?>

<div class="box box-primary">


    <div class="box-body box-profile">
        <?= AccountProfileBox::widget([
            'model' => $model,
        ]) ?>
        <?php if ($model->stats_updated_at): ?>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b><?= $model->getAttributeLabel('followed_by') ?></b>
                    <a class="pull-right">
                        <?= $formatter->asInteger($model->followed_by) ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b><?= $model->getAttributeLabel('follows') ?></b>
                    <a class="pull-right">
                        <?= $formatter->asInteger($model->follows) ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b><?= $model->getAttributeLabel('media') ?></b>
                    <a class="pull-right">
                        <?= $formatter->asInteger($model->media) ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b><?= $model->getAttributeLabel('er') ?></b>
                    <a class="pull-right">
                        <?= $formatter->asPercent($model->er, 2) ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <b><?= $model->getAttributeLabel('stats_updated_at') ?></b>
                    <a class="pull-right">
                        <?= $formatter->asDate($model->stats_updated_at) ?>
                    </a>
                </li>
                <?php if ($model->last_post_taken_at): ?>
                    <li class="list-group-item">
                        <b><?= $model->getAttributeLabel('last_post_taken_at') ?></b>
                        <a class="pull-right">
                            <?= $formatter->asDate($model->last_post_taken_at) ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
        <?= OnOffMonitoringButton::widget([
            'model' => $model,
        ]) ?>

        <?= ProfileButton::widget([
            'model' => $model,
        ]) ?>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Description</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php if ($model->biography): ?>
            <strong><i class="fa fa-book margin-r-5"></i>
                <?= $model->getAttributeLabel('biography') ?>
            </strong>
            <p class="text-muted">
                <?= $formatter->asNtext($model->biography) ?>
            </p>
            <hr>
        <?php endif; ?>
        <?php if ($model->external_url): ?>
            <strong><i class="fa fa-external-link margin-r-5"></i>
                <?= $model->getAttributeLabel('external_url') ?>
            </strong>
            <p class="text-muted">
                <?= Html::a($model->external_url, $model->external_url, ['target' => '_blank']) ?>
            </p>
            <hr>
        <?php endif; ?>

        <?= CategoriesWidget::widget([
            'model' => $model,
        ]); ?>
        <hr>
        <?= NotesSideWidget::widget([
            'model' => $model,
        ]); ?>
    </div>
    <!-- /.box-body -->
</div>