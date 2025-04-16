<div class="box box-widget <?php if(isset($member) && $member->members->count() > 0): ?> <?php else: ?> collapsed-box <?php endif; ?>">
    <div class="box-header with-border w-100">
        <span>Family Members</span>
        <div class="box-tools pull-right">
        <?php if(isset($member) && $member->members->count() > 0): ?>
        <?php
        $username =  explode('-',$member->members->last()->username) ;
        $last_row_number = last($username);
      ?>
        <?php echo Form::hidden('add_on_member',$last_row_number, ['id'=>'add_on_member']); ?>

        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      
        <?php else: ?> 
        <?php echo Form::hidden('add_on_member',0, ['id'=>'add_on_member']); ?>

        <button type="button" class="btn btn-box-tool v-add-on" data-widget="collapse"><i class="fa fa-plus"></i></button>
        <?php endif; ?>
      </div>
    </div>
    <div class="box-body" <?php if(isset($member) && $member->members->count() > 0): ?> <?php else: ?>  style="display: none"  <?php endif; ?> id="family_member_box">

      <?php if(isset($member) && $member->members->count() > 0): ?>
      <?php $__currentLoopData = $member->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $username =  explode('-',$family_member->username) ;
        $row_number = last($username);
      ?>
      <?php echo $__env->make('member::member.partials.family_box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      
      
    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH /home/vimi31/public_html/Modules/Member/Providers/../Resources/views/member/partials/member_family_feilds.blade.php ENDPATH**/ ?>