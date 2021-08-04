<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<?php $__env->startSection('title'); ?>
My Assests
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

                    <th>Transaction</th>
                    <th>Transaction Type</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>% gain / Loss</th>
                    <th>Date</th>
                    <th>Sell Assets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //  print_r($users);die;
                foreach ($assets as $asset) { ?>
                    <tr>
                        <!-- <td><?php //echo  $asset->id ;
                                    ?></td> -->
                        <td><?php echo  $asset->name; ?></td>
                        <td><?php echo  $asset->volume; ?></td>
                        <td><?php echo  $asset->volume; ?></td>
                        <td><?php echo  $asset->price_open; ?></td>
                        <td><?php echo  $asset->price_close; ?></td>
                        <td><?php echo  $asset->created_at; ?></td>
                        <td style="text-align: center;"><button onclick="sellAssets(this)" data-toggle="modal" id="btnPointsModal"  data-target="#sellAsset" class="btn btn-primary sell__points" data-asset-id="<?php echo e($asset->id); ?>"> Sell</button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <div class="right aligned column">
        <?php echo e($assets->links()); ?>

    </div>
</div>

<div class="modal fade" id="sellAsset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" style="margin-left:160px">Sell Asset</h4>
                <label for="quantity" style="margin-left:-10px" class="col-sm-3 assets-price col-form-label"></label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <form id="addform2">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">

                            <input type="hidden" id="asset_id" name="asset_id" value="">
                            <!-- <input type="hidden" id="asset_id" name="asset_id" value=""> -->
                            <input type="hidden" name="name" value="<?php echo e(auth()->user()->name); ?>">
                            <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
                            <input type="number" name="volume" class="form-control" id="volume" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Total Value</label>
                        <div class="col-sm-6">
                            <input type="number" name="wallet_balance" class="form-control" value="" required>
                        </div>

                    </div>
                    <div style="text-align:center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

            <!--    <div class="modal-footer">
                <form action="">
                    <input type="hidden" name="asset_id" id="asset_id">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
 -->
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script text="text/javascript">
    $(document).ready(function() {
        $('#addform2').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "sellasset",
                data: $('#addform2').serialize(),
                success: function(response) {
                    console.log(response)
                    $("#btnPointsModal").click()
                    $("#sellAsset").modal('hide')
                    alert("sell point Sent");
                    location.reload();

                },
                error: function(error) {
                    console.log(error)
                    alert("sell point Not sent");
                }
            });
        });
    })

    function sellAssets(e){
        let assetsId = $(e).data('asset-id');
        $("#asset_id").val(assetsId);
    }


    // $(".sell__points").on('click', function() {
    //     let assetsId = $(this).data('asset_id');
    //     $("#asset_id").val(assetsId)
    //     $('#btnPointsModal').click();

    // });
</script>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>