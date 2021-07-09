

<?php $__env->startSection('title'); ?>
    <?php echo e(__('app.competitions')); ?> :: <?php echo e(__('app.create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <competition-form :input="{fee: <?php echo e(old('fee',0)); ?>, maxParticipants: <?php echo e(old('slots_max', 'null')); ?>, payouts: {amounts: <?php echo e(json_encode(old('payouts_amounts', []))); ?>, types: <?php echo e(json_encode(old('payouts_types', []))); ?> }, editable: true }" inline-template>
        <div class="ui stackable grid container">
            <div class="column">
                <div class="ui <?php echo e($inverted); ?> segment">
                    <form class="ui <?php echo e($inverted); ?> form" method="POST" action="<?php echo e(route('backend.competitions.store')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="field <?php echo e($errors->has('title') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.title')); ?></label>
                            <div class="ui input">
                                <input type="text" name="title" placeholder="<?php echo e(__('app.title')); ?>" value="<?php echo e(old('title')); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('duration') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.duration')); ?></label>
                            <div id="competition-duration-dropdown" class="ui selection dropdown">
                                <input type="hidden" name="duration">
                                <i class="dropdown icon"></i>
                                <div class="default text"><?php echo e(__('app.duration')); ?></div>
                                <div class="menu">
                                    <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-value="<?php echo e($duration); ?>"><?php echo e(__('app.duration_'.$duration)); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('slots_required') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.slots_required')); ?> <span data-tooltip="<?php echo e(__('app.slots_required_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="slots_required" placeholder="<?php echo e(__('app.slots_required')); ?>" value="<?php echo e(old('slots_required')); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('slots_max') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.slots_max')); ?> <span data-tooltip="<?php echo e(__('app.slots_max_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input v-model="fields.maxParticipants" type="text" name="slots_max" placeholder="<?php echo e(__('app.slots_max')); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('start_balance') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.start_balance')); ?> <span data-tooltip="<?php echo e(__('app.start_balance_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui right labeled input">
                                <input type="text" name="start_balance" placeholder="<?php echo e(__('app.start_balance')); ?>" value="<?php echo e(old('start_balance', 100000)); ?>" required autofocus>
                                <div class="ui basic label"><?php echo e(config('settings.currency')); ?></div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('lot_size') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.lot_size')); ?> <span data-tooltip="<?php echo e(__('app.lot_size_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="lot_size" placeholder="<?php echo e(__('app.lot_size')); ?>" value="<?php echo e(old('lot_size', 1)); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('leverage') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.leverage')); ?> <span data-tooltip="<?php echo e(__('app.leverage_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="leverage" placeholder="<?php echo e(__('app.leverage')); ?>" value="<?php echo e(old('leverage', 1)); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('volume_min') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.volume_min')); ?> <span data-tooltip="<?php echo e(__('app.volume_min_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="volume_min" placeholder="<?php echo e(__('app.volume_min')); ?>" value="<?php echo e(old('volume_min', 1)); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('volume_max') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.volume_max')); ?> <span data-tooltip="<?php echo e(__('app.volume_max_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="volume_max" placeholder="<?php echo e(__('app.volume_max')); ?>" value="<?php echo e(old('volume_max', 1000)); ?>" required autofocus>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('min_margin_level') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.min_margin_level')); ?> <span data-tooltip="<?php echo e(__('app.min_margin_level_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui right labeled input">
                                <input type="text" name="min_margin_level" placeholder="<?php echo e(__('app.min_margin_level')); ?>" value="<?php echo e(old('min_margin_level', 10)); ?>" required autofocus>
                                <div class="ui basic label">%</div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('assets') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.allowed_assets')); ?> <span data-tooltip="<?php echo e(__('app.allowed_assets_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div id="competition-assets-dropdown" class="ui multiple search selection remote dropdown">
                                <input type="hidden" name="assets" value="<?php echo e(old('assets')); ?>">
                                <i class="dropdown icon"></i>
                                <div class="default text"><?php echo e(__('app.search')); ?></div>
                                <div class="menu"></div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('recurring') ? 'error' : ''); ?>">
                            <div class="ui checkbox">
                                <input type="checkbox" name="recurring" <?php echo e(old('recurring') ? 'checked="checked"' : ''); ?>>
                                <label><?php echo e(__('app.recurring')); ?> <span data-tooltip="<?php echo e(__('app.recurring_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            </div>
                        </div>

                        

                        <button class="ui large <?php echo e($settings->color); ?> submit button">
                            <i class="save icon"></i>
                            <?php echo e(__('app.save')); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </competition-form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#competition-duration-dropdown').dropdown('set selected', '<?php echo e(old('duration')); ?>');
        $('#competition-assets-dropdown')
            .dropdown({
                minCharacters: 2,
                apiSettings: {
                    action: 'searchAssets'
                }
            });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>