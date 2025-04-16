<?php if(!session('business.enable_price_tax')): ?> 
  <?php
    $default = 0;
    $class = 'hide';
  ?>
<?php else: ?>
  <?php
    $default = null;
    $class = '';
  ?>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered add-product-price-table table-condensed <?php echo e($class, false); ?>">
        <tr>
          <th><?php echo app('translator')->get('product.default_purchase_price'); ?></th>
          <th><?php echo app('translator')->get('product.profit_percent'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.profit_percent') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
          <th><?php echo app('translator')->get('product.default_selling_price'); ?></th>
          <?php if(empty($quick_add)): ?>
            <th><?php echo app('translator')->get('lang_v1.product_image'); ?></th>
          <?php endif; ?>
        </tr>
        <tr>
          <td>
            <div class="col-sm-6">
              <?php echo Form::label('single_dpp', trans('product.exc_of_tax') . ':*'); ?>


              <?php echo Form::text('single_dpp', $default, ['class' => 'form-control input-sm dpp input_number', 'placeholder' => __('product.exc_of_tax'), 'required']); ?>

            </div>

            <div class="col-sm-6">
              <?php echo Form::label('single_dpp_inc_tax', trans('product.inc_of_tax') . ':*'); ?>

            
              <?php echo Form::text('single_dpp_inc_tax', $default, ['class' => 'form-control input-sm dpp_inc_tax input_number', 'placeholder' => __('product.inc_of_tax'), 'required']); ?>

            </div>
          </td>

          <td>
            <br/>
            <?php echo Form::text('profit_percent', number_format($profit_percent, 2), ['class' => 'form-control input-sm input_number', 'id' => 'profit_percent', 'required']); ?>

          </td>

          <td>
              <div class="col-sm-6">
                  <label><span class="dsp_label2"><?php echo app('translator')->get('product.exc_of_sales_tax'); ?></span></label>
                  <?php echo Form::text('single_dsp', $default, ['class' => 'form-control input-sm dsp input_number', 'placeholder' => __('product.exc_of_sales_tax'), 'id' => 'single_dsp', 'required']); ?>

              </div>
              <div class="col-sm-6">
                  <label><span class="dsp_inc_label2"><?php echo app('translator')->get('product.inc_of_sales_tax'); ?></span></label>
                <?php echo Form::text('single_dsp_inc_tax', $default, ['class' => 'form-control input-sm input_number', 'placeholder' => __('product.inc_of_sales_tax'), 'id' => 'single_dsp_inc_tax', 'required']); ?>

              </div>
            
                
          </td>
          <?php if(empty($quick_add)): ?>
          <td>
              <div class="form-group">
                <?php echo Form::label('variation_images', __('lang_v1.product_image') . ':'); ?>

                <?php echo Form::file('variation_images[]', ['class' => 'variation_images', 
                    'accept' => 'image/*', 'multiple']); ?>

                <small><p class="help-block"><?php echo app('translator')->get('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)]); ?> <br> <?php echo app('translator')->get('lang_v1.aspect_ratio_should_be_1_1'); ?></p></small>
              </div>
          </td>
          <?php endif; ?>
        </tr>
    </table>
</div><?php /**PATH /home/vimi31/public_html/resources/views/product/partials/single_product_form_part.blade.php ENDPATH**/ ?>