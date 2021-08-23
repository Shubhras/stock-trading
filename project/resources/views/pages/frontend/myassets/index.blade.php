<style>
    .form__errors {
        font-size: 12px;
        color: #fe0000;
        display: none;
    }

    .form__error {
        font-size: 12px;
        color: #fe0000;
        display: none;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layouts.frontend')

@section('title')
My Assests
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
                    <!-- <th>Transaction Type</th> -->
                    <th style="color:#2185d0">Quantity</th>
                    <th style="color:#2185d0">Cost</th>
                    <th style="color:#2185d0">current Cost</th>
                    <!-- <th>Total Buy Cost</th> -->
                    <!-- <th>Total Sell Cost</th>
                    <th>% Gain / Loss</th> -->
                    <th style="color:#2185d0">Date</th>
                    <th style="color:#2185d0">Sell Assets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($assets as $asset) { 
                    
                    if($asset->quantity != 0){

                    
                    ?>
                    <tr>

                        <td><?php echo  $asset->name; ?></td>
                        <!-- <td><?php //echo  $asset->status; ?></td> -->
                        <td><?php echo  $asset->quantity; ?></td>
                        <td>$ <?php echo  $asset->cost; ?></td>
                        <td>$ <?php echo  $asset->current_value; ?></td>
                        <!-- <td>$ <?php //echo  $asset->total_buy_cost; 
                                    ?></td> -->
                        <!-- <td>$ <?php //echo  $asset->total_sell_cost; 
                                    ?></td>
                        
                        <td><?php //echo  $asset->gain_loss; 
                            ?> %</td> -->

                        <td><?php echo  $asset->created_at; ?></td>

                        <?php if ($asset->updated_at == NULL) { ?>
                            <td style="text-align: center;"><button onclick="sellAssets(this)" data-toggle="modal" id="btnPointsModal" data-target="#sellAsset" class="btn btn-primary sell__points" data-asset-id="{{ $asset->id}}" data-assets-id="{{ $asset->assets_id}}" data-asset-name="{{ $asset->name}}" data-asset-current-price="{{ $asset->current_value}}" data-asset-quantity="{{$asset->quantity}}" data-asset-current-quantity="{{$asset->quantity}}"> Sell</button>
                            </td>
                        <?php } else {
                        ?>

                        <?php }
                        ?>
                    </tr>
                <?php }
            } ?>
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


                <h4 class="modal-title" id="asset_name"></h4>&nbsp;
                <h4 class="modal-title"> - $</h4>
                <h4 class="modal-title current_price"></h4>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <form id="addform3">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row input__error quantity_range">
                        <label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <input type="hidden" id="asset_id" name="asset_id" value="">
                            <input type="hidden" id="assets_id_admin" name="assets_id_admin" value="">
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="assetsCurrentPrice" id="assetsCurrentPrice" value="">
                            <input type="hidden" id="transactiontype" name="transactiontype" value="Received">
                            <input type="hidden" id="assetstype" name="assetstype" value="Sell">

                            <!-- <input type="text" name="asset_buy_quantity" id="asset_buy_quantity" value=""> -->
                            


                            <input type="text" name="volume" class="form-control" id="volume" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Please Enter Quantity number" onkeyup="myFunction()">



                            <!-- <b style="color:red"><span id="test"></span></b> -->
                                        <script>
                                            function myFunction() {
                                                var x = document.getElementById("volume").value;
                                                if (x > 50) {
                                                    document.getElementById("test").innerHTML = "Quantity Available for sell.";
                                                } else {
                                                    document.getElementById("test").innerHTML = "";
                                                }
                                            }
                                        </script>
                            

                            <small class="form__errors">You Can not enter value more then  <input type="text" name="asset-current-quantity" id="asset-current-quantity" style="background-color:white; border: none; color:red; width:30px;" readonly> </small>
                        </div>
                        <!-- </div> -->

                    </div>


                    <div class="form-group row">
                    <label for="quantity" class="col-sm-5 col-form-label">Quantity Available for sell </label>
                    <div class="col-sm-3">
                        
                        
                            <input type="text" name="asset_buy_quantity" id="asset_buy_quantity" class="form-control" style="background-color:white; border: none; margin-left: -37px; color:red" readonly>
                            

                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="quantity" class="col-sm-4 col-form-label">Total Current Cost</label>
                        <div class="col-sm-6">
                            <input type="text" name="wallet_balance" id="totalprice" class="form-control" style="background-color:white;" readonly>
                            <!-- <div id="totalprice"></div> -->

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



@push('scripts')
<script>
    function sellAssets(e) {
        let assetsId = $(e).data('asset-id');
        let assetsIdAdmin = $(e).data('assets-id');
        $("#asset_id").val(assetsId);
        $('#assets_id_admin').val(assetsIdAdmin);
        let assetsQuantity = $(e).data('asset-quantity');
        $("#asset_buy_quantity").val(assetsQuantity);

        let currentAssetsQuenty =$(e).data('asset-current-quantity');
        $("#asset-current-quantity").val(currentAssetsQuenty);
        let assetsCurrentPrice = $(e).data('asset-current-price');
        $(".current_price").html(assetsCurrentPrice);
        $("#assetsCurrentPrice").val(assetsCurrentPrice);
        let assetsName = $(e).data('asset-name');
        $("#asset_name").html(assetsName);
        //$('#btnPointsModal').click();
        /* let assetsTotalCurrentPrice =assetsQuantity*assetsCurrentPrice ;
        $("#totalprice").html(assetsTotalCurrentPrice); */
    };

    
    $("#volume").on('change', () => {
        console.log(parseInt(($("#assetsCurrentPrice").val())) * (parseInt($("#volume").val())))
        $("#totalprice").val(parseInt($("#assetsCurrentPrice").val()) * parseInt($("#volume").val()))
    })
</script>
@endpush

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script text="text/javascript">
    $(document).ready(function() {
        $('#addform3').on('submit', function(e) {
            e.preventDefault();
            
            if (parseInt($('#asset_buy_quantity').val()) >= parseInt($('#volume').val())) {
                $('#addform3').find('.quantity_range').find('.form__errors').hide();
                

                $.ajax({
                    type: "POST",
                    url: "sellmyasset",
                    data: $('#addform3').serialize(),
                    success: function(response) {
                        console.log(response)
                        $("#btnPointsModal").click()
                        $("#sellAsset").modal('hide')
                      //  alert("sell point Sent");
                        location.reload();

                    },
                    error: function(error) {
                        console.log(error)
                      //  alert("sell point Not sent");
                    }

                });
            } else {
                $('#addform3').find('.quantity_range').find('.form__errors').show();
                isValid = false;
            }
        });
    })
</script>