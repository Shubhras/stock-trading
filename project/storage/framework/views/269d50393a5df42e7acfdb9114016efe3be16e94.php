

<?php $__env->startSection('title'); ?>
<?php echo e(__('Users Request Point')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
    .fund_done{
        -webkit-box-shadow: 0 0 0 1px #2185d0 inset!important;
    box-shadow: 0 0 0 1px #2185d0 inset!important;
    color: #5cb85c!important;
    }

    /* .ui.basic.blue.buttonsss, .ui.basic.blue.buttons .buttonsss {
    -webkit-box-shadow: 0 0 0 1px #2185d0 inset!important;
    box-shadow: 0 0 0 1px #2185d0 inset!important;
    color: #5cb85c!important; */
}
</style>
<div class="ui one column stackable grid container">

    <div class="column">
        <table class="ui selectable tablet stackable <?php echo e($inverted); ?> table">
            <thead>
                <tr>
                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'id', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('users.id')); ?>

                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'name', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('users.name')); ?>

                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'email', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('users.email')); ?>

                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'status', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('users.status')); ?>

                    <?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('Fund Request')); ?>

                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('Release Fund')); ?>

                    <?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'last_login_time', 'sort' => $sort, 'order' => $order]); ?>
                    <?php echo e(__('Point Request Date')); ?>

                    <?php echo $__env->renderComponent(); ?>

                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($users as $user) { 
                    $last_update_point= $user->last_request_point_update;
                    
                    if(empty($last_update_point)){
    
                    ?>

                    <tr>
                        <td><?php echo  $user->request_id ?></td>
                        <td> <?php echo $user->name ?>
                        </td>
                        <td><?php echo $user->email ?></td>
                        <td data-title="<?php echo e(__('users.status')); ?>"><i class="<?php echo e($user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban'); ?> large icon"></i> <?php echo e(__('users.status_' . $user->status)); ?></td>

                        <td><?php echo $user->fund_request ?></td>

                        <td><?php echo $user->release_fund ?></td>

                        <td><?php echo $user->created_at ?></td>
                        <?php $user_request =$user->request_id;?>
                    
                        <td class="right aligned tablet-and-below-center">
                            <a class="ui icon <?php echo e($settings->color); ?> basic button" href="<?php echo e(route('backend.users_request_point.edit', $user_request,)); ?>">
                                <i class="edit icon"></i>
                                Release fund    
                            </a>
                        </td>


                    </tr>
                    <?php  }else {
                        ?>

                        <tr>
                        <td><?php echo  $user->request_id ?></td>
                        <td> <?php echo $user->name ?>
                        </td>
                        <td><?php echo $user->email ?></td>
                        <td data-title="<?php echo e(__('users.status')); ?>"><i class="<?php echo e($user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban'); ?> large icon"></i> <?php echo e(__('users.status_' . $user->status)); ?></td>

                        <td><?php echo $user->fund_request ?></td>

                        <td><?php echo $user->release_fund ?></td>

                        <td><?php echo $user->created_at ?></td>
                        <?php $user_request =$user->request_id;?>
                    
                        <td class="right aligned tablet-and-below-center"> 
                            <button class="btn btn-success" style="color: #5cb85c!important;background:white; border: 1px solid; height: 31px; border-radius: 5px;">
                                <!-- <i class="edit icon"></i> -->
                                <i class="<?php echo e($user->status == App\Models\User::STATUS_ACTIVE ? 'check green' : 'red ban'); ?> large icon"></i>
                                Fund Done  
                            </button>
                        </td>


                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>