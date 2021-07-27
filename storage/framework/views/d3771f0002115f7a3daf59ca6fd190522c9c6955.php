;

<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->id !==1): ?>
<div style="text-align: right;">
    <button href="#" style="margin-right: 108px;margin-top:-10px;" data-toggle="modal" data-target="#RequestPoint" class="ui small basic blue icon submit nowrap button">Request Points</button>
</div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="RequestPoint" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Request Points</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('userrequestpoint.store'); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">

                    <div class="form-group">
                        <p style="text-align: center;"><b>Request Points from site admin</b></p><br />
                        <input type="number" style="width:200px;margin-left:140px" class="form-control" aria-describedby="emailHelp" placeholder="Enter Points"><br />
                    </div>
                    <p style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </p>
                </div>
                <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>