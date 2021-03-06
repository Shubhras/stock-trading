<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layouts.frontend')

@section('title')
Wallet
@endsection

@section('content')
<div class="ui one column stackable grid container">
    <!--  <div class="center aligned column">
            
                <i class="dollar icon"></i>Transactions
                {{ __('app.create_asset') }}
           
        </div> -->

    <div class="column">

        <table id="assets-table" class="ui selectable tablet stackable {{ $inverted }} table">
            <thead>
                <tr>

                    <th style="color:#2185d0">Transaction</th>
                    <th style="color:#2185d0">Transaction Type</th>
                    <th style="color:#2185d0">Quantity</th>
                    <th style="color:#2185d0">Cost</th>
                    <!-- <th>Total Buy Cost</th> -->
                    <th style="color:#2185d0">Total Sell Cost</th>
                    <th style="color:#2185d0">% Gain / Loss</th>
                    <th style="color:#2185d0">Date</th>
                    <!-- <th>Sell Assets</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                //  print_r($users);die;
                foreach ($assets as $asset) { 
                    // print_r($asset);die;
              
                $profit = $asset->gain_loss;
                    if($profit < 0){

                    
                    ?>
                    <tr >
                        <!-- <td><?php //echo  $asset->id ;
                                    ?></td> -->
                        <td><?php echo  $asset->name; ?></td>
                        <td><?php echo  $asset->status; ?></td>
                        <td><?php echo  $asset->quantity; ?></td>
                        <td>$ <?php echo  $asset->cost; ?></td>
                        <!-- <td>$ <?php //echo  $asset->total_buy_cost; ?></td> -->
                        <td>$ <?php echo  $asset->total_sell_cost; ?></td>
                        
                        <td style="color:red"><?php echo  $asset->gain_loss; ?> %</td>
                        
                        <td><?php echo  $asset->created_at; ?></td>
                        

                    </tr>
                    <?php }else{?>

                        <tr >
                        <!-- <td><?php //echo  $asset->id ;
                                    ?></td> -->
                        <td><?php echo  $asset->name; ?></td>
                        <td><?php echo  $asset->status; ?></td>
                        <td><?php echo  $asset->quantity; ?></td>
                        <td>$ <?php echo  $asset->cost; ?></td>
                        <!-- <td>$ <?php //echo  $asset->total_buy_cost; ?></td> -->
                        <td>$ <?php echo  $asset->total_sell_cost; ?></td>
                        
                        <td style="color:green"><?php echo  $asset->gain_loss; ?> %</td>
                        
                        <td><?php echo  $asset->created_at; ?></td>
                        

                    </tr>
                <?php }  } ?>
            </tbody>
        </table>

    </div>
    <div class="right aligned column">
        {{ $assets->links() }}
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
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <input type="hidden" id="asset_id" name="asset_id" value="">
                            <input type="hidden" id="transactiontype" name="transactiontype" value="Received">

                            <input type="hidden" id="assettype" name="assettype" value="Sell">

                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
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
@endsection
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