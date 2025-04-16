<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="col-md-3 col-xs-4 product_list no-print">
		<div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom" data-variation_id="<?php echo e($product->id, false); ?>" data-product_id="<?php echo e($product->product_id, false); ?>" title="<?php echo e($product->name, false); ?> <?php if($product->type == 'variable'): ?>- <?php echo e($product->variation, false); ?> <?php endif; ?> <?php echo e('(' . $product->sub_sku . ')', false); ?>">
		<div class="image-container">
			<?php if(count($product->media) > 0): ?>
				<img src="<?php echo e($product->media->first()->display_url, false); ?>" alt="Product Image">
			<?php elseif(!empty($product->product_image)): ?>
				<img src="<?php echo e(asset('/uploads/img/' . $product->product_image), false); ?>" alt="Product Image">
			<?php else: ?>
				<img src="<?php echo e(asset('/img/default.png'), false); ?>" alt="Product Image">
			<?php endif; ?>
		</div>
			<div class="text text-muted text-uppercase">
				<small><?php echo e($product->name, false); ?> 
				<?php if($product->type == 'variable'): ?>
					- <?php echo e($product->variation, false); ?>

				<?php endif; ?>
				</small>
			</div>
			<small class="text-muted">
				(<?php echo e($product->sub_sku, false); ?>)
			</small>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<input type="hidden" id="no_products_found">
	<div class="col-md-12">
		<h4 class="text-center">
			<?php echo app('translator')->get('lang_v1.no_products_to_display'); ?>
		</h4>
	</div>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/product_list.blade.php ENDPATH**/ ?>