

<?php $__env->startSection('title'); ?>
<?php echo e(__('app.dashboard')); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<!-- <?php if($first_time_login): ?>
<h3>Welcome Popup</h3>
<?php else: ?>
<h3>Hey! 🖐 Nothing to Show</h3>
<?php endif; ?> -->

<!-- <?php if(Session::get('status')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?php echo e(Session::get('status')); ?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?> -->
<div class="ui stackable grid container">
    <div class="ten wide column">
        <img src="<?php echo e(asset('images/trading.jpeg')); ?>" style="height: 100%;width:100%" class="image">
        <!-- <h2 class="ui <?php echo e($settings->color); ?> dividing header">
                <?php echo e(__('app.top_traded')); ?>

            </h2>
            <div class="ui equal width stackable grid">
                <?php if($top_traded_assets->isEmpty()): ?>
                    <div class="column">
                        <div class="ui <?php echo e($inverted); ?> segment">
                            <p><?php echo e(__('app.no_open_trades')); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $top_traded_assets->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_traded_assets_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <?php $__currentLoopData = $top_traded_assets_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="center aligned column">
                                    <div class="ui <?php echo e($inverted); ?> segment">
                                        <div class="ui small <?php echo e($inverted); ?> statistic">
                                            <img class="ui tiny centered image" src="<?php echo e($asset->logo_url); ?>">
                                            <div class="value">
                                                <?php echo e($asset->symbol); ?>

                                            </div>
                                            <div class="label">
                                                <?php echo e($asset->_trades_count); ?>

                                                <?php echo e(__('app.trades')); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <h2 class="ui <?php echo e($settings->color); ?> dividing header">
                <?php echo e(__('app.top_traders')); ?>

            </h2>
            <div class="ui equal width stackable grid">
                <?php if($top_traders->isEmpty()): ?>
                    <div class="column">
                        <div class="ui <?php echo e($inverted); ?> segment">
                            <p><?php echo e(__('app.no_closed_trades')); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php $__currentLoopData = $top_traders->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_traders_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <?php $__currentLoopData = $top_traders_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="column">
                                <div class="ui cards">
                                    <div class="top-trader card">
                                        <div class="content">
                                            <a href="<?php echo e(route('frontend.users.show', $trader->user)); ?>">
                                                <img class="right floated mini ui image" src="<?php echo e($trader->user->avatar_url); ?>">
                                            </a>
                                            <div class="header">
                                                <?php echo e($trader->user->name); ?>

                                            </div>
                                            <div class="meta">
                                                <?php echo e(__('app.joined')); ?>

                                                <?php echo e($trader->user->append('created_at')->created_at->diffForHumans()); ?>

                                            </div>
                                            <div class="description">
                                                <span class="ui circular <?php echo e($settings->color); ?> label"><?php echo e($trader->profitable_trades); ?></span>
                                                <?php echo e(__('app.profitable_trades')); ?>

                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <div class="ui two buttons">
                                                <a href="<?php echo e(route('frontend.users.show', $trader->user)); ?>" class="ui basic <?php echo e($settings->color); ?> button"><?php echo e(__('app.view_profile')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div> -->
    </div>
    <div class="six wide column">
        <!--  <h2 class="ui <?php echo e($settings->color); ?> dividing header">
                <?php echo e(__('app.top_trades')); ?>

            </h2>
            <div class="ui one column stackable grid">
                <?php if($top_trades->isEmpty()): ?>
                    <div class="column">
                        <div class="ui <?php echo e($inverted); ?> segment">
                            <p><?php echo e(__('app.no_closed_trades')); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="column">
                        <div class="ui large feed">
                            <?php $__currentLoopData = $top_trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="event">
                                    <div class="label">
                                        <a href="<?php echo e(route('frontend.users.show', $top_trade->user)); ?>">
                                            <img src="<?php echo e($top_trade->user->avatar_url); ?>">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="date">
                                            <?php echo e(__('app.closed_at')); ?>

                                            <?php echo e($top_trade->closed_at->diffForHumans()); ?>

                                        </div>
                                        <div class="content">
                                            <i class="arrow <?php echo e($top_trade->direction == \App\Models\Trade::DIRECTION_BUY ? 'up green' : 'down red'); ?> icon"></i>
                                            <span class="ui <?php echo e($top_trade->direction == \App\Models\Trade::DIRECTION_BUY ? 'green' : 'red'); ?> tiny basic ">
                                                <?php echo e(__('app.trade_direction_' . $top_trade->direction)); ?>

                                            </span>
                                            <?php echo e($top_trade->_quantity); ?> <img class="ui inline image" src="<?php echo e($top_trade->asset->logo_url); ?>"> <b><?php echo e($top_trade->asset->symbol); ?></b>
                                        </div>
                                        <div class="content">
                                            <span class="ui right pointing <?php echo e($settings->color); ?> basic label"><?php echo e(__('app.profit')); ?></span>
                                            <span class="tooltip" data-tooltip="<?php echo e(_('app.open_price')); ?>: <?php echo e($top_trade->_price_open); ?>, <?php echo e(_('app.close_price')); ?>: <?php echo e($top_trade->_price_close); ?>" <?php echo e($inverted ? 'data-inverted="false"' : ''); ?>>
                                                <?php echo e($top_trade->_pnl); ?> <?php echo e($top_trade->currency->code); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui divider"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div> -->
        <h2 class="ui <?php echo e($settings->color); ?> dividing header">
            <?php echo e(__('app.top_traded')); ?>

        </h2>
        <div class="ui equal width stackable grid">
            <?php if($top_traded_assets->isEmpty()): ?>
            <div class="column">
                <div class="ui <?php echo e($inverted); ?> segment">
                    <p><?php echo e(__('app.no_open_trades')); ?></p>
                </div>
            </div>
            <?php else: ?>
            <?php $__currentLoopData = $top_traded_assets->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_traded_assets_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <?php $__currentLoopData = $top_traded_assets_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="center aligned column" style="max-width: 144px;max-height:150px;">
                    <div class="ui <?php echo e($inverted); ?> segment " style="height:150px;width: 118px">
                        <div class="ui small <?php echo e($inverted); ?> statistic">
                            <img class="ui tiny centered image" src="<?php echo e($asset->logo_url); ?>">
                            <div class="">
                                <?php echo e($asset->symbol); ?>

                            </div>
                            <div class="label">
                                <?php echo e($asset->_trades_count); ?>

                                <?php echo e(__('app.trades')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>


        <h2 class="ui <?php echo e($settings->color); ?> dividing header">
            <!-- <?php echo e(__('app.top_traded')); ?> -->Recent Treades
        </h2>
        <div class="ui equal width stackable grid">
            <?php if($recent_TradedAssets->isEmpty()): ?>
            <div class="column">
                <div class="ui <?php echo e($inverted); ?> segment">
                    <p>
                        <!-- <?php echo e(__('app.no_open_trades')); ?> -->No recent trade yet.
                    </p>
                </div>
            </div>
            <?php else: ?>
            <?php $__currentLoopData = $recent_TradedAssets->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_TradedAssets_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="column">
                <!--     <?php $__currentLoopData = $recent_TradedAssets_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
                <div class="center aligned column">
                    <!-- <div class="ui <?php echo e($inverted); ?> segment">
                                        <div class="ui small <?php echo e($inverted); ?> statistic"> -->
                    <li>
                        <!--    <div class=""> -->
                        <?php echo e($assets->name); ?>

                        <!-- </div> -->
                    </li>
                    <!-- </div>
                                    </div> -->
                </div>
                <!--  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>