<?php $__env->startSection('title'); ?>
  Transactions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ui one column stackable grid container">
       <!--  <div class="center aligned column">
            
                <i class="dollar icon"></i>Transactions
                <?php echo e(__('app.create_asset')); ?>

           
        </div> -->
      
        <div class="column">
           
                <table id="assets-table" class="ui selectable tablet stackable <?php echo e($inverted); ?> table">
                    <thead>
                    <tr>
                      
                        <th>Assets</th>
                        <th>Buy/Sell</th>
                        <th>Quantity</th>
                        <th>Amount</th> 
                        <th>Total Amount</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                  //  print_r($users);die;
                  foreach($assets as $asset) { ?>
                        <tr>
                            <td><?php echo  $asset->name ;?></td>
                            <td><?php echo  $asset->assettype ;?></td>
                            <td><?php echo  $asset->volume ;?></td>
                            <td>$ <?php echo  $asset->price_open ;?></td>
                          
                            <td>$ <?php echo  $asset->price_close ;?></td>
                            <td><?php echo  $asset->created_at ;?></td>
                        </tr>
                  <?php } ?>
                    </tbody>
                </table>
           
        </div>
        <div class="right aligned column">
            <?php echo e($assets->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>