<div class="modal-dialog" role="document" style="width: 50%;">
    <div class="modal-content">
        <?php echo Form::open(['url' => action([\Modules\MPCS\Http\Controllers\Form9CSettingsController::class, 'update'], [$settings->id]), 'method' => 'post', 'id' => 'update_9c_form_settings' ]); ?>


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo app('translator')->get( 'mpcs::lang.edit_form_9_c_settings' ); ?></h4>
        </div>

        <div class="modal-body">
            <div class="col-md-12"><br />

                <!-- Date and Time -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('mpcs::lang.date_and_time'); ?></label>
                        <?php echo Form::date('datepicker', date('Y-m-d', strtotime($settings->date_time)), [
                            'class' => 'form-control',
                            'placeholder' => __( 'mpcs::lang.date_and_time' ),
                            'required',
                            'id' => 'datepicker'
                        ]); ?>

                    </div>
                </div>

                <!-- Form Starting Number -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('mpcs::lang.form_starting_number'); ?> <span class="required" aria-required="true">*</span></label>
                        <?php echo Form::text('form_starting_number', $settings->starting_number, [
                            'class' => 'form-control',
                            'placeholder' => __( 'mpcs::lang.form_starting_number' ),
                            'required',
                            'id' => 'form_starting_number'
                        ]); ?>

                    </div>
                </div>

                <!-- Ref Previous Form Number -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('mpcs::lang.previous_note'); ?> <span class="required" aria-required="true">*</span></label>
                        <?php echo Form::text('ref_previous_form_number', $settings->ref_pre_form_number, [
                            'class' => 'form-control',
                            'placeholder' => __( 'mpcs::lang.previous_note' ),
                            'required',
                            'id' => 'ref_previous_form_number'
                        ]); ?>

                    </div>
                </div>

              

                <!-- Previous Day Grand Total (Payments Section) -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('mpcs::lang.user_added'); ?> <span class="required" aria-required="true">*</span></label>
                        <?php echo Form::text('user_added', $settings->added_user, [
                            'class' => 'form-control',
                            'placeholder' => __( 'mpcs::lang.user_added' ),
                            'id' => 'user_added'
                        ]); ?>

                    </div>
                </div>

                <!-- Other fields remain unchanged -->

            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/partials/edit_9c_form_settings.blade.php ENDPATH**/ ?>