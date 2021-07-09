

<?php $__env->startSection('title'); ?>
    <?php echo e(__('app.assets')); ?> :: <?php echo e(__('app.create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ui one column stackable grid container">
        <div class="column">
            <div class="ui <?php echo e($inverted); ?> segment">
                <form class="ui <?php echo e($inverted); ?> form" method="POST" action="<?php echo e(route('backend.assets.store')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <image-upload-input name="logo" default-image-url="<?php echo e(asset('images/asset.png')); ?>" class="<?php echo e($errors->has('logo') ? 'error' : ''); ?>" color="<?php echo e($settings->color); ?>">
                        <?php echo e(__('app.logo')); ?>

                    </image-upload-input>
                    <div class="field <?php echo e($errors->has('price') ? 'error' : ''); ?>">
                        <label><!-- <?php echo e(__('app.price')); ?> -->ID</label>
                        <div class="ui input">
                            <input type="text" name="price" placeholder="Enter ID" value="<?php echo e(old('price')); ?>" required autofocus>
                        </div>
                    </div>
                   
                    <div class="field <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.name')); ?></label>
                        <div class="ui input">
                            <input type="text" name="name" placeholder="<?php echo e(__('app.name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('price') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.price')); ?></label>
                        <div class="ui input">
                            <input type="text" name="price" placeholder="<?php echo e(__('app.price')); ?>" value="<?php echo e(old('price')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                        <label><!-- <?php echo e(__('app.name')); ?> -->Description</label>
                        <div class="ui input">
                            <textarea type="text" name="name" placeholder="Message" value="<?php echo e(old('name')); ?>" required autofocus></textarea>
                        </div>
                    </div>
                   
                    <button class="ui large <?php echo e($settings->color); ?> submit button">
                        <i class="save icon"></i>
                        <?php echo e(__('app.save')); ?>

                    </button>
                </form>
            </div>
        </div>
        <div class="column">
            <a href="<?php echo e(route('backend.assets.index')); ?>"><i class="left arrow icon"></i> <?php echo e(__('app.back_all_assets')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#asset-market-dropdown').dropdown('set selected', '<?php echo e(old('market')); ?>');
        $('#asset-currency-dropdown').dropdown('set selected', '<?php echo e(old('currency')); ?>');
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>