<?php
    $footersettings = DB::table('system')->where('key', 'app_footer')->select('value')->first();
?>

<!-- Main Footer -->
  <footer class="main-footer no-print">
    
    <small>
    	<?php echo e($footersettings->value ?? "", false); ?>

    </small>
    
</footer><?php /**PATH /home/vimi31/public_html/resources/views/layouts/partials/footer.blade.php ENDPATH**/ ?>