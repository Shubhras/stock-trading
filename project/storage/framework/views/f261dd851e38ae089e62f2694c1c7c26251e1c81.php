<div id="backend-sidebar" class="ui left vertical <?php echo e($inverted); ?> menu sidebar">
    <div class="header item"><?php echo e(__('app.frontend')); ?></div>
    <a href="<?php echo e(route('frontend.index')); ?>" class="item">
        <?php echo e(__('app.home_page')); ?>

        <i class="home icon"></i>
    </a>
    <div class="header item"><?php echo e(__('app.backend')); ?></div>
    <!--  <a href="<?php echo e(route('backend.dashboard')); ?>" class="item<?php echo e(Route::currentRouteName()=='backend.dashboard' ? ' active' : ''); ?>">
        <?php echo e(__('app.dashboard')); ?>

        <i class="heartbeat icon"></i>
    </a> -->
    <a href="<?php echo e(route('backend.assets.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.assets.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('app.assets')); ?>

        <i class="chart bar icon"></i>
    </a>
    <!-- <a href="<?php echo e(route('backend.competitions.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.competitions.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('app.competitions')); ?>

        <i class="trophy icon"></i>
    </a> -->
    <!-- <a href="<?php echo e(route('backend.trades.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.trades.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('app.trades')); ?>

        <i class="retweet icon"></i>
    </a> -->
    <a href="<?php echo e(route('backend.users.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.users.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('users.users')); ?>

        <i class="users icon"></i>
    </a>

    <a href="<?php echo e(route('backend.users_request_point.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.users_request_point.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('Users Request Point')); ?>

        <i class="users icon"></i>
    </a>

<!--     
 -->
    <!-- <a href="<?php echo e(route('backend.addons.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.addons.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('settings.addons')); ?>

        <i class="codepen icon"></i>
    </a> -->
    <!--  <a href="<?php echo e(route('backend.settings.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.settings.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('settings.settings')); ?>

        <i class="settings icon"></i>
    </a> -->
    <!--  <a href="<?php echo e(route('backend.maintenance.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.maintenance.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('maintenance.maintenance')); ?>

        <i class="server icon"></i>
    </a> -->
    <!--  <a href="<?php echo e(route('backend.license.index')); ?>" class="item<?php echo e(strpos(Route::currentRouteName(),'backend.license.')!==FALSE ? ' active' : ''); ?>">
        <?php echo e(__('license.registration')); ?>

        <i class="copyright outline icon"></i>
    </a> -->
    <!-- <log-out-button token="<?php echo e(csrf_token()); ?>" class="item">
        <?php echo e(__('auth.logout')); ?>

        <i class="sign out alternate icon"></i>
    </log-out-button> -->


    <form method="POST" action="/logout"><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <a class="item">
            <i class="sign out alternate icon"></i>
            <input type="submit" style="border:0px;background-color:white;width:85%;text-align:left" value="Log out" />
        </a>
    </form>
</div>
<div id="backend-menu" class="ui top fixed <?php echo e($inverted); ?> menu">
    <div class="ui container">
        <a id="backend-sidebar-toggle" class="item"><i class="bars icon"></i></a>
        <span class="header item">
            <a href="<?php echo e(route('backend.dashboard')); ?>"><?php echo e(__('app.app_name')); ?></a>
<!--             <span class="ui basic <?php echo e($settings->color); ?> label"><?php echo e(config('app.version')); ?></span>
 -->        </span>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    $('#backend-sidebar')
        .sidebar('setting', 'transition', 'overlay')
        .sidebar('attach events', '#backend-sidebar-toggle');
</script>
<?php $__env->stopPush(); ?>