@extends('layouts.frontend')

@section('title')
  Transactions
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
                      
                        <th style="color:#2185d0">Assets</th>
                        <th style="color:#2185d0">Buy/Sell</th>
                        <th style="color:#2185d0">Quantity</th>
                        <th style="color:#2185d0">Amount</th> 
                        <th style="color:#2185d0">Total Amount</th>
                        <th style="color:#2185d0">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                  //  print_r($users);die;
                  foreach($assets as $asset) { 

                    if($asset->assettype == "Buy"){
                      
                      ?>
                        <tr >
                            <td><?php echo  $asset->name ;?></td>
                            <td style="color:red"><?php echo  $asset->assettype ;?></td>
                            <td><?php echo  $asset->volume ;?></td>
                            <td>$ <?php echo  $asset->price_open ;?></td>
                          
                            <td>$ <?php echo  $asset->price_close ;?></td>
                            <td><?php echo  $asset->created_at ;?></td>
                        </tr>
                        <?php }else{
                            ?>
                            <tr >
                            <td><?php echo  $asset->name ;?></td>
                            <td style="color:green"><?php echo  $asset->assettype ;?></td>
                            <td><?php echo  $asset->volume ;?></td>
                            <td>$ <?php echo  $asset->price_open ;?></td>
                          
                            <td>$ <?php echo  $asset->price_close ;?></td>
                            <td><?php echo  $asset->created_at ;?></td>
                        </tr>
                  <?php } }?>
                    </tbody>
                </table>
           
        </div>
        <div class="right aligned column">
            {{ $assets->links() }}
        </div>
    </div>
@endsection