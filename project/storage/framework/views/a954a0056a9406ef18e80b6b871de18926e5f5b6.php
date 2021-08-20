

<?php $__env->startSection('title'); ?>
    <?php echo e($user->name); ?> :: <?php echo e(__('User Request Point')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ui one column stackable grid container">
        <div class="column">
            <div class="ui <?php echo e($inverted); ?> segment">
                <form class="ui <?php echo e($inverted); ?> form" method="POST" action="<?php echo e(route('backend.users_request_point.update', $release_fund_user->id)); ?>" enctype="multipart/form-data" id="request_point_form">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    
                    <input type="hidden" name="id" placeholder="" value="<?php echo $release_fund_user->id ?>">
                    <div class="field <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                        <label><?php echo e(__('users.name')); ?></label>
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="name" placeholder="<?php echo e(__('users.name')); ?>" value="<?php echo $release_fund_user->name ?>" required autofocus disabled>
                        </div>
                    </div>
                    <div class="field <?php echo e($errors->has('role') ? 'error' : ''); ?>">
                        
                    </div>
                   
                    <div class="field <?php echo e($errors->has('email') ? 'error' : ''); ?>">
                        <label><?php echo e(__('users.email')); ?></label>
                        <div class="ui left icon input">
                            <i class="mail icon"></i>
                            <input type="email" name="email" placeholder="<?php echo e(__('users.email')); ?>" value="<?php echo $release_fund_user->email ?>" required autofocus disabled>
                        </div>
                    </div>

                    <div class="field <?php echo e($errors->has('email') ? 'error' : ''); ?>">
                        <label><?php echo e(__('Fund Request')); ?></label>
                        <div class="ui left icon input">
                            <i class="dollar icon"></i>
                            <input type="text" name="fund_request" placeholder="Fund Request" value="<?php echo $release_fund_user->fund_request ?>" required autofocus disabled>
                        </div>
                    </div>

                    <div class="field <?php echo e($errors->has('email') ? 'error' : ''); ?>">
                        <label><?php echo e(__('Release Fund')); ?></label>
                        <div class="ui left icon input">
                            <i class="dollar icon"></i>
                            <input type="text" name="release_fund" placeholder="Release fund" value="<?php echo $release_fund_user->release_fund ?>" autofocus required>
                        </div>
                    </div>
                   
                    
                    <button class="ui large <?php echo e($settings->color); ?> submit icon button">
                        <i class="save icon"></i>
                        <?php echo e(__('users.save')); ?>

                    </button>
                    <!-- <a href="<?php echo e(route('backend.users.delete', $user)); ?>" class="ui large red submit right floated icon button">
                        <i class="trash icon"></i>
                        <?php echo e(__('users.delete')); ?>

                    </a> -->
                </form>
            </div>
        </div>
        <div class="column">
            <a href="<?php echo e(url()->previous()); ?>"><i class="left arrow icon"></i> <?php echo e(__('users.back_all')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#user-role-dropdown').dropdown('set selected', '<?php echo e($user->role); ?>');
        $('#user-status-dropdown').dropdown('set selected', '<?php echo e($user->status); ?>');
    </script>

<script type="text/javascript" src="<?php echo e(asset('/js/jquery-ui.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/mycustom.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/moment-with-locales.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.validate.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.method.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/jquery.tagsinput.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/tag-it.min.js')); ?>"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
   $("#request_point_form").validate({
      rules: {

        release_fund: {
           required: true,
           minlength: 1,

         },

      },
      messages: {

        release_fund: {
                   required: "Please Enter release fund",
                   minlength: "Specification field accept minimum 1 value",

               },

           },
   });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>