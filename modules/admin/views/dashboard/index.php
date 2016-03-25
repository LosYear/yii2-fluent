<?php
use yii\fluent\modules\admin\Module;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = Module::t('main', 'Dashboard');

$this->title = Module::t('main', 'Dashboard') ;

$this->params['title'] = $this->title;

?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>
            <div class="info-box-content">
                <div class="info-box-text" style="margin-bottom: 10px;"><?php echo Module::t('main', 'Pages')  ?></div>
                <div>
                    <a href="<?php echo Url::toRoute(['page/index']) ?>"><i class="fa fa-list" style="width:20px"></i><?php echo Module::t('main', 'Manage') ?></a><br/>
                    <a href="<?php echo Url::toRoute(['page/create']) ?>"><i class="fa fa-plus" style="width:20px"></i><?php echo Module::t('main', 'Create') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-th-large"></i></span>
            <div class="info-box-content">
                <div class="info-box-text" style="margin-bottom: 10px;"><?php echo Module::t('main', 'Blocks')  ?></div>
                <div>
                    <a href="<?php echo Url::toRoute(['block/index']) ?>"><i class="fa fa-list" style="width:20px"></i><?php echo Module::t('main', 'Manage') ?></a><br/>
                    <a href="<?php echo Url::toRoute(['block/create']) ?>"><i class="fa fa-plus" style="width:20px"></i><?php echo Module::t('main', 'Create') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bars"></i></span>
            <div class="info-box-content">
                <div class="info-box-text" style="margin-bottom: 10px;"><?php echo Module::t('main', 'Menu')  ?></div>
                <div>
                    <a href="<?php echo Url::toRoute(['menu/index']) ?>"><i class="fa fa-list" style="width:20px"></i><?php echo Module::t('main', 'Manage') ?></a><br/>
                    <a href="<?php echo Url::toRoute(['menu/create']) ?>"><i class="fa fa-plus" style="width:20px"></i><?php echo Module::t('main', 'Create') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cog"></i></span>
            <div class="info-box-content">
                <div class="info-box-text" style="margin-bottom: 10px;"><?php echo Module::t('main', 'Settings')  ?></div>
                <div>
                    <a href="<?php echo Url::toRoute(['settings/index']) ?>"><i class="fa fa-list" style="width:20px"></i><?php echo Module::t('main', 'Manage') ?></a><br/>
                    <a href="<?php echo Url::toRoute(['settings/index']) ?>"><i class="fa fa-wrench" style="width:20px"></i><?php echo Module::t('main', 'Manage (advanced)') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
