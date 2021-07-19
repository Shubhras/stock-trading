

<?php $__env->startSection('title'); ?>
Assets
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<data-feed></data-feed>
<div class="ui tablet stackable grid container">
    <?php if($assets->isEmpty()): ?>
    <div class="sixteen wide column">
        <div class="ui segment">
            <p><?php echo e(__('app.assets_empty')); ?></p>
        </div>
    </div>
    <?php else: ?>
    <?php if($markets->count() > 1): ?>
    <div class="five wide column">
        <div id="market-dropdown" class="ui selection fluid dropdown">
            <i class="dropdown icon"></i>
            <div class="default text"></div>
            <div class="menu">
                <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('frontend.assets.index')); ?>?market=<?php echo e($market->code); ?>" data-value="<?php echo e($market->code); ?>" class="item"><i class="<?php echo e($market->country_code); ?> flag"></i><?php echo e($market->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="sixteen wide column">
        <assets-table :assets-list="<?php echo e($assets->getCollection()); ?>" class="ui selectable <?php echo e($inverted); ?> table">
            <template slot="header">
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'symbol', 'sort' => $sort, 'order' => $order, 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.name')); ?>

                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'price', 'sort' => $sort, 'order' => $order, 'class' => 'right aligned', 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.price')); ?>

                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'change_abs', 'sort' => $sort, 'order' => $order, 'class' => 'right aligned', 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.change_abs')); ?>

                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'change_pct', 'sort' => $sort, 'order' => $order, 'class' => 'right aligned', 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.change_pct')); ?>

                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'market_cap', 'sort' => $sort, 'order' => $order, 'class' => 'right aligned', 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.market_cap')); ?>

                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.tables.sortable-column', ['id' => 'trades_count', 'sort' => $sort, 'order' => $order, 'class' => 'right aligned', 'query' => ['market' => $selected_market]]); ?>
                <?php echo e(__('app.trades')); ?>

                <?php echo $__env->renderComponent(); ?>
            </template>
        </assets-table>
    </div>
    <div class="sixteen wide right aligned column">
        <?php echo e($assets->appends(['sort' => $sort])->appends(['order' => $order])->appends(['market' => $selected_market])->links()); ?>

    </div>
    <?php endif; ?>
</div>

<button style="display:none;" data-toggle="modal" id="btnPointsModal" data-target="#buyPointsForAssetsModal" class="ui small basic blue icon submit nowrap button">s</button>

<div class="modal fade" id="buyPointsForAssetsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="assetSymbol"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="quantity" >
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="quantity" class="col-sm-3 col-form-label">Total Amount</label>
                        <label for="quantity" id="assetsPrice" class="col-sm-3 col-form-label">Total Amount</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <form action="">
                    <input type="hidden" name="asset_id" id="asset_id">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('#market-dropdown').dropdown('set selected', '<?php echo e($selected_market); ?>');
    // $(".buy__points").click((e) => {
    //     console.log($(this).attr('assets_id'))
    // })
    $(".buy__points").on('click', function() {
        let assetsSymbol = $(this).data('asset_symbol');
        $("#assetSymbol").html(assetsSymbol);
        let assetsPrice = $(this).data('asset_price');
        $("#assetsPrice").html(assetsPrice);
        let assetsId = $(this).data('assets_id');
       // console.log(assetsId);
        $("#asset_id").val(assetsId)
        $('#btnPointsModal').click();
        
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>