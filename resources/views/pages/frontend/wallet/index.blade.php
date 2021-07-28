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
                  foreach($assets as $asset) { ?>
                        <tr>
                            <td><?php echo  $asset->name ;?></td>
                            <td><?php echo  $asset->volume ;?></td>
                            <td><?php echo  $asset->price_open ;?></td>
                            <td><?php echo  $asset->volume ;?></td>
                            <td><?php echo  $asset->price_close ;?></td>
                            <td><?php echo  $asset->created_at ;?></td>
                            <td style="text-align: center;"><button style="" data-toggle="modal" id="btnPointsModal" data-target="#buyPointsForAssetsModal" class="btn btn-primary">Sell</button>
</td>

                        </tr>
                  <?php } ?>
                    </tbody>
                </table>
           
        </div>
        <div class="right aligned column">
            {{ $assets->links() }}
        </div>
    </div>

    <div class="modal fade" id="buyPointsForAssetsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title"  style="margin-left:160px">Sell Asset</h4>
                <label for="quantity" style="margin-left:-10px" class="col-sm-3 assets-price col-form-label"></label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <form id="addform1">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" id="asset_id" name="asset_id" value="">
                            <input type="hidden" name="price_open" id="price_open">
                            <input type="hidden" name="assetsPrice" id="assetsPrice">
                            <input type="number" name="volume" class="form-control" id="volume" required>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Total Value</label>
                        <div class="col-sm-6">
                            <input type="number" name="price_close" class="form-control" id="price_close" value="">
                        </div>
                        
                    </div>
                    <div style="text-align:center">
                    <button type="submit"  class="btn btn-primary">Submit</button>
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