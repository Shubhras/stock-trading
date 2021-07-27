

<?php $__env->startSection('title'); ?>
    <?php echo e($competition->title); ?> :: <?php echo e(__('app.edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <competition-form :input="{fee: <?php echo e(old('fee', $competition->fee)); ?>, maxParticipants: <?php echo e(old('slots_max', $competition->slots_max)); ?>, payouts: {amounts: <?php echo e(json_encode(old('payouts_amounts', $payouts_amounts))); ?>, types: <?php echo e(json_encode(old('payouts_types', $payouts_types))); ?>}, editable: <?php echo e($editable ? 'true' : 'false'); ?> }" inline-template>
        <div class="ui one column stackable grid container">
            <div class="column">
                <div class="ui <?php echo e($inverted); ?> segment">
                    <form class="ui <?php echo e($inverted); ?> form" method="POST" action="<?php echo e(route('backend.competitions.update', $competition)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="field <?php echo e($errors->has('title') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.title')); ?></label>
                            <div class="ui input">
                                <input type="text" name="title" placeholder="<?php echo e(__('app.title')); ?>" value="<?php echo e(old('title', $competition->title)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('duration') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.duration')); ?></label>
                            <div id="competition-duration-dropdown" class="ui selection disabled dropdown">
                                <input type="hidden" name="duration">
                                <i class="dropdown icon"></i>
                                <div class="default text"></div>
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
                                <input type="text" name="slots_required" placeholder="<?php echo e(__('app.slots_required')); ?>" value="<?php echo e(old('slots_required', $competition->slots_required)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('slots_max') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.slots_max')); ?> <span data-tooltip="<?php echo e(__('app.slots_max_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input v-model="fields.maxParticipants" type="text" name="slots_max" placeholder="<?php echo e(__('app.slots_max')); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('start_balance') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.start_balance')); ?> <span data-tooltip="<?php echo e(__('app.start_balance_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui right labeled input">
                                <input type="text" name="start_balance" placeholder="<?php echo e(__('app.start_balance')); ?>" value="<?php echo e(old('start_balance', $competition->start_balance)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                                <div class="ui basic label"><?php echo e($competition->currency->code); ?></div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('lot_size') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.lot_size')); ?> <span data-tooltip="<?php echo e(__('app.lot_size_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="lot_size" placeholder="<?php echo e(__('app.lot_size')); ?>" value="<?php echo e(old('lot_size', $competition->lot_size)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('leverage') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.leverage')); ?> <span data-tooltip="<?php echo e(__('app.leverage_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="leverage" placeholder="<?php echo e(__('app.leverage')); ?>" value="<?php echo e(old('leverage', $competition->leverage)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('volume_min') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.volume_min')); ?> <span data-tooltip="<?php echo e(__('app.volume_min_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="volume_min" placeholder="<?php echo e(__('app.volume_min')); ?>" value="<?php echo e(old('volume_min', $competition->volume_min)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('volume_max') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.volume_max')); ?> <span data-tooltip="<?php echo e(__('app.volume_max_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui input">
                                <input type="text" name="volume_max" placeholder="<?php echo e(__('app.volume_max')); ?>" value="<?php echo e(old('volume_max', $competition->volume_max)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('min_margin_level') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.min_margin_level')); ?> <span data-tooltip="<?php echo e(__('app.min_margin_level_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div class="ui right labeled input">
                                <input type="text" name="min_margin_level" placeholder="<?php echo e(__('app.min_margin_level')); ?>" value="<?php echo e(old('min_margin_level', $competition->min_margin_level)); ?>" required autofocus <?php echo e($editable ? '' : 'disabled'); ?>>
                                <div class="ui basic label">%</div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('assets') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.allowed_assets')); ?> <span data-tooltip="<?php echo e(__('app.allowed_assets_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            <div id="competition-assets-dropdown" class="ui multiple search selection dropdown">
                                <input type="hidden" name="assets" value="<?php echo e(implode(',', $competition->assets->pluck('id')->toArray())); ?>">
                                <i class="dropdown icon"></i>
                                <div class="default text"><?php echo e(__('app.search')); ?></div>
                                <div class="menu">
                                    <?php $__currentLoopData = $competition->assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-value="<?php echo e($asset->id); ?>"><?php echo e($asset->name); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('recurring') ? 'error' : ''); ?>">
                            <div class="ui checkbox">
                                <input type="checkbox" name="recurring" <?php echo e(old('recurring', $competition->recurring) ? 'checked="checked"' : ''); ?>>
                                <label><?php echo e(__('app.recurring')); ?> <span data-tooltip="<?php echo e(__('app.recurring_hint')); ?>"><i class="question circle outline tooltip icon"></i></span></label>
                            </div>
                        </div>
                        <div class="field <?php echo e($errors->has('status') ? 'error' : ''); ?>">
                            <label><?php echo e(__('app.status')); ?></label>
                            <div id="competition-status-dropdown" class="ui selection <?php echo e($editable ? '' : 'disabled'); ?> dropdown">
                                <input type="hidden" name="status">
                                <i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu">
                                    <div class="item" data-value="<?php echo e($competition->status); ?>"><?php echo e(__('app.competition_status_'.$competition->status)); ?></div>
                                    <div class="item" data-value="<?php echo e(\App\Models\Competition::STATUS_CANCELLED); ?>"><?php echo e(__('app.competition_status_'.\App\Models\Competition::STATUS_CANCELLED)); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label><?php echo e(__('app.start_time')); ?></label>
                            <div class="ui input">
                                <input value="<?php echo e($competition->start_time); ?>" disabled>
                            </div>
                        </div>
                        <div class="field">
                            <label><?php echo e(__('app.end_time')); ?></label>
                            <div class="ui input">
                                <input value="<?php echo e($competition->end_time); ?>" disabled>
                            </div>
                        </div>

                        

                        <div class="field">
                            <label><?php echo e(__('app.created_at')); ?></label>
                            <div class="ui input">
                                <input value="<?php echo e($competition->created_at); ?> (<?php echo e($competition->created_at->diffForHumans()); ?>)" disabled>
                            </div>
                        </div>
                        <div class="field">
                            <label><?php echo e(__('app.created_by')); ?></label>
                            <div class="ui input">
                                <input value="<?php echo e($competition->user->name); ?>" disabled>
                            </div>
                        </div>
                        <div class="field">
                            <label><?php echo e(__('app.updated_at')); ?></label>
                            <div class="ui input">
                                <input value="<?php echo e($competition->updated_at); ?> (<?php echo e($competition->updated_at->diffForHumans()); ?>)" disabled>
                            </div>
                        </div>
                        <button class="ui large <?php echo e($settings->color); ?> submit <?php echo e($editable ? '' : 'disabled'); ?> button">
                            <i class="save icon"></i>
                            <?php echo e(__('app.save')); ?>

                        </button>
                        <a href="<?php echo e(route('backend.competitions.delete', $competition)); ?>" class="ui large red submit right floated icon button">
                            <i class="trash icon"></i>
                            <?php echo e(__('app.delete')); ?>

                        </a>
                    </form>
                </div>
            </div>
            <div class="column">
                <a href="<?php echo e(route('backend.competitions.index')); ?>"><i class="left arrow icon"></i> <?php echo e(__('app.back_all_competitions')); ?></a>
            </div>
        </div>
    </competition-form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#competition-duration-dropdown').dropdown('set selected', '<?php echo e(old('duration', $competition->duration)); ?>');
        $('#competition-status-dropdown').dropdown('set selected', '<?php echo e(old('status', $competition->status)); ?>');
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