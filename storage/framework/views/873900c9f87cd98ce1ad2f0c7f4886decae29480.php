<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php echo $__env->make('includes.frontend.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="frontend <?php echo e(str_replace('.','-',Route::currentRouteName())); ?> background-<?php echo e($settings->background); ?> color-<?php echo e($settings->color); ?>">
    <?php echo $__env->renderWhen(config('settings.gtm_container_id'), 'includes.frontend.gtm-body', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path'))); ?>

    <div id="app">

        <?php echo $__env->make('includes.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div id="before-content">
            <?php echo $__env->renderWhen(config('settings.adsense_client_id') && config('settings.adsense_top_slot_id'),
                'includes.frontend.adsense',
                ['client_id' => config('settings.adsense_client_id'), 'slot_id' => config('settings.adsense_top_slot_id')]
            , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path'))); ?>

            <?php echo $__env->yieldContent('before-content'); ?>
        </div>

        <div id="content">
            <div class="ui stackable grid container">
                <div class="column">
                    <h1 class="ui <?php echo e($settings->color); ?> header">
                        <?php echo $__env->yieldContent('title'); ?>
                    </h1>
                    <?php $__env->startSection('messages'); ?>
                        <?php $__env->startComponent('components.session.messages'); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php echo $__env->yieldSection(); ?>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <div id="after-content">
            <?php echo $__env->yieldContent('after-content'); ?>

            <?php echo $__env->renderWhen(config('settings.adsense_client_id') && config('settings.adsense_bottom_slot_id'),
                'includes.frontend.adsense',
                ['client_id' => config('settings.adsense_client_id'), 'slot_id' => config('settings.adsense_bottom_slot_id')]
            , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path'))); ?>
        </div>

        <?php echo $__env->first(['includes.frontend.footer-udf','includes.frontend.footer'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php echo $__env->make('includes.frontend.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>