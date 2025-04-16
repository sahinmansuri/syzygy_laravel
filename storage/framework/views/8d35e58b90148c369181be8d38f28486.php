<fieldset>
  <div class="row">
    <div class="col-md-6 p-0">
      <label class="text-center w-100 l-date">Year</label>
      <div class="field-inline-block w-100 text-center">
      <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control"  placeholder="Y" name="<?php echo e($date_feild_name, false); ?>[y][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['y'][0], false); ?>" <?php endif; ?>>
      <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="Y" name="<?php echo e($date_feild_name, false); ?>[y][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['y'][1], false); ?>" <?php endif; ?>/>
      <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="Y" name="<?php echo e($date_feild_name, false); ?>[y][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['y'][2], false); ?>" <?php endif; ?>/>
      <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="Y" name="<?php echo e($date_feild_name, false); ?>[y][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['y'][3], false); ?>" <?php endif; ?>/>
      </div>
    </div>
       
    <div class="col-md-3 p-0">
      <label class="text-center w-100 l-date">Month</label>
      <div class="field-inline-block w-100 text-center">
        <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="M" name="<?php echo e($date_feild_name, false); ?>[m][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['m'][0], false); ?>" <?php endif; ?>/>
        <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="M" name="<?php echo e($date_feild_name, false); ?>[m][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['m'][1], false); ?>" <?php endif; ?>/>
      </div>
    </div>
    <div class="col-md-3 p-0">
        <label class="text-center w-100 l-date">Date</label>
        <div class="field-inline-block w-100 text-center">
      
       <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="D" name="<?php echo e($date_feild_name, false); ?>[d][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['d'][0], false); ?>" <?php endif; ?>/>
       <input type="text" pattern="[0-9]*" maxlength="1" size="1" class="date-field form-control" placeholder="D" name="<?php echo e($date_feild_name, false); ?>[d][]" <?php if(isset($data_feild['y'])): ?>value="<?php echo e($data_feild['d'][1], false); ?>" <?php endif; ?>/>
      </div>
    </div>
  </div>
  </fieldset>
  <?php /**PATH /home/vimi31/public_html/resources/views/components/date_feild_component.blade.php ENDPATH**/ ?>