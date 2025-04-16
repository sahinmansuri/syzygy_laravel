<div class="box box-widget">
	<div class="box-header with-border w-100">
		<?php
		//  temp cat id and brand id if there is any temp data
			$cat_id_suggestion = !empty($temp_data->cat_id_suggestion)?$temp_data->cat_id_suggestion:0;
			$brand_id_suggestion = !empty($temp_data->brand_id_suggestion)?$temp_data->brand_id_suggestion:0;
		?>
	<?php if(!empty($categories)): ?>
	<div class="form-group col-md-12" style="width: 100% !important">
		<select class="select2" id="product_category" style="width:45% !important">

			<option value="all"><?php echo app('translator')->get('lang_v1.all_category'); ?></option>

			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($category['id'], false); ?>" <?php if($category['id'] == $cat_id_suggestion): ?> selected <?php endif; ?>><?php echo e($category['name'], false); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(!empty($category['sub_categories'])): ?>
					<optgroup label="<?php echo e($category['name'], false); ?>">
						<?php $__currentLoopData = $category['sub_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<i class="fa fa-minus"></i> <option value="<?php echo e($sc['id'], false); ?>"><?php echo e($sc['name'], false); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</optgroup>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</select>
	</div>	
	<?php endif; ?>
	
	<?php if(!empty($brands)): ?>
	<div class="form-group col-md-12" style="width: 100% !important">
	
		&nbsp;
		<?php echo Form::select('size', $brands, !empty($brand_id_suggestion)?$brand_id_suggestion:null, ['id' => 'product_brand', 'class' => 'select2', 'name' => null, 'style' => 'width:45% !important']); ?>

	</div>	
	<?php endif; ?>
	

	<div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	</div>

	<!-- /.box-tools -->
	</div>
	<!-- /.box-header -->
	<input type="hidden" id="suggestion_page" value="1">
	<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<div class="eq-height-row" id="product_list_body"></div>
		</div>
		<div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none;">
			<i class="fa fa-spinner fa-spin fa-2x"></i>
		</div>
	</div>
	</div>
	<!-- /.box-body -->
</div><?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/product_list_box.blade.php ENDPATH**/ ?>