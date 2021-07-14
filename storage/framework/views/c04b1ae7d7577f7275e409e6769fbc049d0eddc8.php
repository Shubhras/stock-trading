

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
                    <div class="field <?php echo e($errors->has('symbol') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.symbol')); ?></label>
                        <div class="ui input">
                            <input type="text" name="symbol" placeholder="<?php echo e(__('app.symbol')); ?>" value="<?php echo e(old('symbol')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('symbol_ext') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.symbol_ext')); ?></label>
                        <div class="ui input">
                            <input type="text" name="symbol_ext" placeholder="<?php echo e(__('app.symbol_ext')); ?>" value="<?php echo e(old('symbol_ext')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.name')); ?></label>
                        <div class="ui input">
                            <input type="text" name="name" placeholder="<?php echo e(__('app.name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                        <label><!-- <?php echo e(__('app.name')); ?> -->Description</label>
                        <div class="ui input">
                            <textarea type="text" name="message" placeholder="Message" value="<?php echo e(old('message')); ?>" required autofocus></textarea>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('market') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.market')); ?></label>
                        <div id="asset-market-dropdown" class="ui selection dropdown">
                            <input type="hidden" name="market">
                            <i class="dropdown icon"></i>
                            <div class="default text"><?php echo e(__('app.market')); ?></div>
                            <div class="menu">
                                <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-value="<?php echo e($market->id); ?>"><?php echo e($market->name); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('price') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.price')); ?></label>
                        <div class="ui input">
                            <input type="text" name="price" placeholder="<?php echo e(__('app.price')); ?>" value="<?php echo e(old('price')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('currency') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.currency')); ?></label>
                        <div id="asset-currency-dropdown" class="ui selection search dropdown">
                            <input type="hidden" name="currency">
                            <i class="dropdown icon"></i>
                            <div class="default text"><?php echo e(__('app.currency')); ?></div>
                            <div class="menu">
                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-value="<?php echo e($currency->id); ?>"><?php echo e($currency->code); ?> &mdash; <?php echo e($currency->name); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('change_abs') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.change_abs')); ?></label>
                        <div class="ui input">
                            <input type="text" name="change_abs" placeholder="<?php echo e(__('app.change_abs')); ?>" value="<?php echo e(old('change_abs')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('change_pct') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.change_pct')); ?></label>
                        <div class="ui input">
                            <input type="text" name="change_pct" placeholder="<?php echo e(__('app.change_pct')); ?>" value="<?php echo e(old('change_pct')); ?>" required autofocus>
                        </div>
                    </div>
                   <!--  <div class="field <?php echo e($errors->has('volume') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.volume')); ?></label>
                        <div class="ui input">
                            <input type="text" name="volume" placeholder="<?php echo e(__('app.volume')); ?>" value="<?php echo e(old('volume')); ?>" required autofocus>
                        </div>
                    </div> -->
                  <!--   <div class="field <?php echo e($errors->has('supply') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.supply')); ?></label>
                        <div class="ui input">
                            <input type="text" name="supply" placeholder="<?php echo e(__('app.supply')); ?>" value="<?php echo e(old('supply')); ?>" required autofocus>
                        </div>
                    </div> -->
                   <!--  <div class="field <?php echo e($errors->has('market_cap') ? 'error' : ''); ?>">
                        <label><?php echo e(__('app.market_cap')); ?></label>
                        <div class="ui input">
                            <input type="text" name="market_cap" placeholder="<?php echo e(__('app.market_cap')); ?>" value="<?php echo e(old('market_cap')); ?>" required autofocus>
                        </div>
                    </div> -->
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