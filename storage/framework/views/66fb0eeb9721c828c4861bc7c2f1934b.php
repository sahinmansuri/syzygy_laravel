<style>
    .btn-large {
        padding: 18px 28px;
        font-size: 22px; //change this to your desired size
        line-height: normal;
    }

    .active {
        background: #666 !important;
    }

    #key_pad input {
        border: none;
    }

    #key_pad button {
        height: 80px;
        width: 30%;
        font-size: 25px;
        margin: 2px 1px;
        border: none !important;
    }

    .payment_type_checkbox {
        display: none;
    }
</style>
<form name="calculator">
    <div class="clearfix"></div>
    <br />
    <div class="">
        <div class="col-md-8 col-lg-8">
            <div class="row">
                <h2 style="color: red; text-align: center;">
                    <?php if(session('status')): ?>
                        <?php
                            $output = session('status');
                            if($output['success'] && isset($output['collection_form_no'])){
                                $collection_form_no = $output['collection_form_no'] ?? $collection_form_no;
                            }
                        ?>
                    <?php endif; ?>
                    Shift NO: <?php echo e($shift_number, false); ?>

                    | Form No.: <?php echo e($collection_form_no, false); ?>

                </h2>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <h2><?php echo app('translator')->get('petro::lang.payments'); ?></h2>
                </div>
                <div class="col-md-6">
                    <input name="display" class="form-control input-lg amount input_number" style="margin-top: 10px; background: #fff; border: 2px solid #333;" id="amount" value="" />
                    <input type="hidden" name="payment_type" id="payment_type" value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="<?php if($pop_up): ?>col-md-12 <?php else: ?> col-md-8 <?php endif; ?>">
            <div class="col-md-5 col-lg-5">
                <div class="row">
                    <div class="btn-group-vertical">
                        <label class="payment_type_btn btn btn-large btn-flat btn-block btn-primary">
                            <input class="payment_type_checkbox <?php if(!empty($enter_cash_denoms) && $enter_cash_denoms == 'yes'): ?> cash_denoms_enter <?php endif; ?>" type="checkbox" name="payment_type" value="cash" autocomplete="off" />
                            <?php echo app('translator')->get('petro::lang.cash'); ?>
                        </label>
                        <label class="payment_type_btn btn btn-large btn-flat card_payment_btn btn-block btn-info">
                            <input class="payment_type_checkbox" type="checkbox" name="payment_type" value="card" autocomplete="off" />
                            <?php echo app('translator')->get('petro::lang.card'); ?>
                            <input type="hidden" id="sub_card_type">
                            <input type="hidden" id="sub_slip_no">
                        </label>
                        <label class="payment_type_btn btn btn-large btn-flat btn-block btn-danger add_cheque_payment">
                            <input class="payment_type_checkbox" type="checkbox" name="payment_type" value="cheque" autocomplete="off" /> <?php echo app('translator')->get('petro::lang.cheque'); ?>
                        </label>
                        <label class="payment_type_btn btn btn-large btn-flat btn-block btn-warning">
                            <input class="payment_type_checkbox <?php if(!empty($direct_cr) && $direct_cr == 'yes'): ?> po_credit_payment <?php endif; ?>" type="checkbox" name="payment_type" value="credit" autocomplete="off" /> <?php echo app('translator')->get('petro::lang.credit'); ?>
                        </label>
                        <label class="payment_type_btn btn btn-large btn-flat btn-block btn-success">
                            <input class="payment_type_checkbox" type="checkbox" name="payment_type" value="multiple_credit" autocomplete="off" /> <?php echo app('translator')->get('petro::lang.multiple_credit'); ?>
                        </label>
                        
                        <label class="payment_type_btn btn btn-large btn-flat btn-block btn-danger">
                            <input class="payment_type_checkbox" type="checkbox" name="payment_type" value="other" autocomplete="off" /> <?php echo app('translator')->get('petro::lang.other'); ?>
                        </label>
                        
                    </div>
                </div>
            </div>
            <div id="key_pad" class="row col-md-6 text-center" style="margin-left: 7px;">
                <div class="row">
                    <button id="7" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">7</button>
                    <button id="8" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">8</button>
                    <button id="9" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">9</button>
                </div>
                <div class="row">
                    <button id="4" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">4</button>
                    <button id="5" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">5</button>
                    <button id="6" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">6</button>
                </div>
                <div class="row">
                    <button id="1" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">1</button>
                    <button id="2" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">2</button>
                    <button id="3" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">3</button>
                </div>
                <div class="row">
                    <button id="backspace" type="button" class="btn btn-danger" onclick="enterVal(this.id)">⌫</button>
                    <button id="0" type="button" class="btn btn-primary btn-sm" onclick="enterVal(this.id)">0</button>
                    <button id="precision" type="button" class="btn btn-success" onclick="enterVal(this.id)">.</button>
                </div>
            </div>
        </div>
        <?php if(!$pop_up): ?>
        <div class="col-md-3">
            <div class="row">
                
                <h5 class="text-danger"><?php echo app('translator')->get('petro::lang.balance_to_settle'); ?>: <?php echo e(number_format($balance_to_deposit,  2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></h5>
                
                <button class="btn btn-flat btn-lg btn-block add_other_sales" type="button" style="background: #8F3A84; color: #ffffff;"><?php echo app('translator')->get('petro::lang.enter_meters'); ?></button>
                <br />
                
                <button class="btn btn-success btn-flat btn-lg btn-block amount-correct" type="button"><?php echo app('translator')->get('petro::lang.amount_correct_click_here'); ?></button>
                <br />
                
                <a href="<?php echo e(action('\Modules\Petro\Http\Controllers\PumpOperatorController@dashboard'), false); ?>"><input value="Dashboard" class="btn btn-flat btn-lg btn-block" style="color: #fff; background-color: #810040;" type="button" /> </a>
                
                <br />
                <button disabled value="save" id="payment_submit" name="submit" class="btn btn-flat btn-lg btn-block" style="color: #fff; background-color: #2874a6;" type="button"><?php echo app('translator')->get('lang_v1.save'); ?></button>
                <br />
                <span onclick="reset()">
                    <button type="button" class="btn btn-flat btn-lg btn-block" style="color: #fff; background-color: #cc0000;" type="button"><i class="fa fa-refresh" aria-hidden="true"></i> <?php echo app('translator')->get('petro::lang.cancel'); ?></button>
                </span>
                <br />
                <a href="<?php echo e(action('Auth\PumpOperatorLoginController@logout'), false); ?>" class="btn btn-flat btn-block btn-lg pull-right" style="background-color: orange; color: #fff;"><?php echo app('translator')->get('petro::lang.logout'); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</form>
<?php
    $collection_form_no = "";
?>
<?php if(session('status')): ?>
    <?php
        $output = session('status');
        if($output['success'] && isset($output['collection_form_no'])){
            $collection_form_no = $output['collection_form_no'] ?? "";
        }
    ?>
<?php endif; ?>
<input type="hidden" class="collection_form_no" id="collection_form_no" value="<?php echo e($collection_form_no, false); ?>">
<div id="reloadConfirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reloadConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reloadConfirmationModalLabel">Confirm Another Payment for Form No.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Need to Enter Another Payment?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" id="cancelReload">Yes</button>
                
                <a href="/petro/pump-operators/dashboard" class="btn btn-secondary pull-left" style="background-color: #810040; color: white;">No</a>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($collection_form_no)): ?>
    <script>
        $(document).ready(function() {
            $("#reloadConfirmationModalLabel").html("Confirm Another Payment for Form No. " + <?php echo e($collection_form_no, false); ?>);
            $("#reloadConfirmationModal").modal("show");
        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function() {
        $("#confirmReload").on("click", function () {
            location.reload();
        });
        
        $("#cancelReload").off().on("click", function () {
            $("#meter_sales_compulsory").val("no");
            $("#reloadConfirmationModal").modal("hide");
            $("#reloadConfirmationModal").css("display", "none");
            reset();
        });
    });
</script>
<input type="hidden" id="meter_sales_compulsory" value="yes">
<?php if($meter_sales_compulsory): ?> 
    <script>
        $(".payment_type_btn").each(function (i, ele) {
            var meter_sales_compulsory = $("#meter_sales_compulsory").val();
            if(meter_sales_compulsory == "yes"){
                $(ele).addClass("active");
                $(this).find(".payment_type_checkbox").attr("checked", false);
            }
        });
        $(document).on("click", ".payment_type_btn", function () {
            var meter_sales_compulsory = $("#meter_sales_compulsory").val();
            if(meter_sales_compulsory == "yes"){
                toastr.error("First Enter Meters");
            }
        });
    </script>
<?php endif; ?><?php /**PATH /home/vimi31/public_html/Modules/Petro/Providers/../Resources/views/pump_operators/partials/payment_section.blade.php ENDPATH**/ ?>