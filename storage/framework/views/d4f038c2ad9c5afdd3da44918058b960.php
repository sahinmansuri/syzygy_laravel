<?php if($pos_settings['hide_product_suggestion'] == 0): ?>
	<?php echo $__env->make('sale_pos.partials.product_list_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH /home/vimi31/public_html/resources/views/sale_pos/partials/right_div.blade.php ENDPATH**/ ?>