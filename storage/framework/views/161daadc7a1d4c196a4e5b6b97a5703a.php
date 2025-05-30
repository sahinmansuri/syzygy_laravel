<?php $__env->startSection('title', __('cheque.write_cheque')); ?>

<?php $__env->startSection('content'); ?>
<style>
    label.error {
        color: red
    }
    
    #template {
        margin: auto;
        background-position: -3px 10px;
        background-size: cover;
        background-repeat: repeat;
        background-color: #b0e5ea;
       
        width: 850px;
        border: 1px solid #000;
        height: 325px
    }

    .Bank-a #pay {
        float: left;
        position: relative;
        top: 110px;
        left: 108px;
        color: #000
    }

    .Bank-a #date {
        float: right;
        position: relative;
        right: 55px;
        top: 50px;
        color: #000
    }

    .Bank-a #amount {
        float: right;
        position: relative;
        top: 110px;
        margin-right: -30px;
        color: #000
    }

    .Bank-b {
        background-image: url(<?php echo e(asset('chequer/img/cheque2.png'), false); ?>);
        margin: auto;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-color: #b0e5ea;
        width: 670px;
        border: 1px solid #000;
        height: 300px;
        margin-top: 50px
    }

    .Bank-b #pay {
        float: left;
        position: relative;
        top: 86px;
        left: 108px;
        color: #000
    }

    .Bank-b #date {
        float: right;
        position: relative;
        right: 190px;
        top: 29px;
        color: #000
    }

    .Bank-b #amount {
        float: right;
        position: relative;
        top: 85px;
        margin-right: 50px;
        color: #000
    }

    .Bank-c {
        background-image: url(<?php echo e(asset('chequer/img/cheque3.png'), false); ?>);
        margin: auto;
        background-position: center;
        background-size: cover;
        background-repeat: repeat;
        background-color: #b0e5ea;
        width: 670px;
        border: 1px solid #000;
        height: 300px;
        margin-top: 50px
    }

    .Bank-c #pay {
        float: left;
        position: relative;
        top: 107px;
        left: 100px;
        color: #000
    }

    .Bank-c #date {
        float: right;
        position: relative;
        right: 140px;
        top: 57px
    }

    .Bank-c #amount {
        float: right;
        position: relative;
        top: 110px;
        margin-right: 0;
        color: #000
    }

    .Bank-d {
        background-image: url(<?php echo e(asset('chequer/img/cheque4.png'), false); ?>);
        margin: auto;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-color: #b0e5ea;
        width: 670px;
        border: 1px solid #000;
        height: 300px;
        margin-top: 50px
    }

    .Bank-d #pay {
        float: left;
        position: relative;
        top: 100px;
        left: 110px;
        color: #000
    }

    .Bank-d #date {
        float: right;
        position: relative;
        right: 55px;
        top: 28px;
        color: #000
    }

    .Bank-d #amount {
        float: right;
        position: relative;
        top: 100px;
        margin-right: 25px;
        color: #000
    }

    #errorP {
        display: none;
    }

    .margbotm {
        margin-bottom: 10px;
        max-height: 78px;
        min-height: 80px;
    }
    .box-body {
        height: 800px;
    }


</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->get('cheque.write_cheque'); ?></h1>
	<div class="col-md-2" style="margin-top: 20px; float: right">
    	<button type="button" id="bank_to_write_cheques" class="btn btn-sm btn-primary btn_get_word" style="display: none;"
    		onclick="">Bank to Write Cheques</button>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'cheque.write_cheque')]); ?>
	<?php

    if(count($get_defultvalu) > 0){
        foreach($get_defultvalu as $values){}
        $def_tempid			= $values->def_tempid;
        $def_curnctname		= $values->def_curnctname;
        $def_stampid		= $values->def_stampid;
        $def_entrydt		= $values->def_entrydt;
        $def_currency		= $values->def_currency;
        $def_stamp			= $values->def_stamp;
        $def_cheque_templete= $values->def_cheque_templete;
        $def_bank_account	= $values->def_bank_account;
        $def_font			= $values->def_font;
        $def_font_size		= $values->def_font_size;
    }else{
        $def_tempid			= '';
        $def_curnctname		= '';
        $def_stampid		= '';
        $def_entrydt		= '';
        $def_currency		= '';
        $def_stamp			= '';
        $def_cheque_templete= '';
        $def_bank_account	= '';
        $def_font			= '';
        $def_font_size		= '';
    }
    ?>
    <div class="col-sm-12 col-lg-12 col-md-12 main">
        <div class="row panel-body">
        
            <div class="col-md-2 margbotm">
                <label>Select Payee Name:</label>
                <select id="myText" class="form-control">
                    <option vlaue="">Select Payee</option>
                    <?php foreach ($results as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2 margbotm">
                <label>Payment For:</label>
                <select id="payment_for" name="payment_for" class="form-control">
                    <option vlaue="">Payment For</option>
					<?php $__currentLoopData = config('view.payment4'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($val, false); ?>"><?php echo e($lbl, false); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p id="errorP" style="color: red;"></p>
            </div>
			<div class="col-md-2 margbotm">
                <label>Payment Type:</label>
                <select id="payment_type" name="payment_type" class="form-control">
                    <option vlaue="">Payment Type</option>
					<?php $__currentLoopData = config('view.payment_type'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val=>$lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($val, false); ?>"><?php echo e($lbl, false); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <p id="errorP" style="color: red;"></p>
            </div>
			<div class="col-md-2 margbotm">
                <label id="purchase_id_label">Select Purchase Order:</label>
                <select id="purchase_id" name="purchase_id" class="form-control"
                    onchange="getSupplierBillNoAndOrderNo()">
                    <option vlaue="">Select Order NO</option>
                </select>
                <p id="errorP" style="color: red;">No Purchase Order yet.</p>
            </div>
            <div class="col-md-2 margbotm">
                <label id="purchse_bill_no_label">Bill Number:</label>
                <input type="text" class="form-control" name="purchse_bill_no" id="purchse_bill_no" readonly="">
            </div>
            <div class="col-md-2 margbotm">
                <label>Supplier Order Number:</label>
                <input type="text" class="form-control" name="supplier_order_no" id="supplier_order_no" readonly="">
            </div>
            <div class="col-md-2 margbotm">
                <label>Unpaid Amount:</label>
                <input type="text" class="form-control" name="payable_amount" id="payable_amount" readonly="" onchange="validateDecimalInput(this)">
            </div>
            <div class="col-md-2 margbotm">
                <label>Payment Status:</label>
                <select class="form-control" id="paid_to_supplier" name="paid_to_supplier" onchange="addStatusToTemplate(this)">
                    <option value="">Select Payment Status</option>
                    <option value="full">Full Payment</option>
                    <option value="partial">Partial Payment</option>
                    <option value="last">Last Payment</option>
                </select>
            </div>

<div class="col-md-2">
    <label>Select Cheque Template:</label>
    <select id="mySelect" class="form-control" onchange="temFunction()">
        <option>Select Cheque Template</option>
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($row->id, false); ?>"><?php echo e($row->template_name, false); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="col-md-2">
    <label>Select Bank Account:</label>
    <select id="bankacount" class="form-control" onchange="getBankNextChequedNO();">
        <option value="">Please select a cheque template first</option>
    </select>
</div>


            <div class="col-md-2" id="paydive">
                <label>Enter Amount:</label>
                <input type="number" id="mynumber" class="form-control get_num" value="">
            </div>
            <div class="col-md-2">
                <label>Select Stamp / Seal:</label>
                <select id="addStamps" class="form-control" onchange="checkstamp(this.value);">
                    <option value="">None</option>
					<?php $__currentLoopData = $stamps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
                        $stamp_image = $row['stamp_name'];
					?>

                    <option <?php if(!empty($get_defultvalu)): ?>  <?php if($stamp_image == $def_stamp): ?> selected="selected" <?php endif; ?> <?php endif; ?>
                        value="<?php echo e(asset('chequer/'.$row['stamp_image']), false); ?>"><?php echo e($row['stamp_name'], false); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
		<div class="row panel-body">
			<div class="col-md-2">
				<label>Date Condition:</label>
				<select id="dateCondition" class="form-control">
					<option selected="selected" value="select_date">Select Date</option>
					<option value="print_date_later">Print Date Later</option>
				</select>
			</div>
			<div class="col-md-2" id="select_date_part">
				<label>Select Date:</label>
				<input type="text" id="mydate" class="form-control" value="">
			</div>
			<div class="col-md-2">
				<label>Currency:</label>
				<select id="currencyType" onchange="checkcurrency();" class="form-control">
					<option value="">None</option>
					<?php
					foreach($get_currency as $currency){
						$curname = $currency['country'].' '.$currency['currency'];
					?>
					<option <?php if(!empty($get_defultvalu)){ if($curname == $def_currency){ ?>selected="selected"
						<?php } } ?> value="<?php echo $currency['country'].' '.$currency['currency']; ?>"><?php echo ucwords($currency['country'].' '.$currency['currency']); ?>
					</option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-2">
				<label>On Account Of:</label>
				<input type="text" id="acountof" name="acountof" onkeyup="printacountfo();" class="form-control">
			</div>
			<div class="col-md-2">
				<label>Cheque No:</label>
				<input type="text" name="chequeNo" id="chequeNo" onkeyup="getchaqudata();" class="form-control" value="" readonly>
			</div>
			<div class="col-md-2">
				<label>Date & Time :</label>
				<input type="text" id="mydate2" class="form-control" readonly value="<?php echo e(date('d-m-Y H:i'), false); ?>">
			</div>
		</div>
        <div class="row">
			<div class="col-md-6">
				<div class="row">
				    <div class="col-md-3">
						<input type="checkbox" id="postDate" style="" onclick="stamps()"> <label>Post Date Cheque</label>
					</div>

                    <div class="col-md-3">
                        <input type="checkbox" id="showInAccount" 
                               onclick="stamps()" 
                               <?php if($post_date_enabled): ?> 
                                   enabled 
                               <?php else: ?> 
                                   disabled 
                               <?php endif; ?>> 
                        <label><?php echo app('translator')->get('cheque.show_in_the_account'); ?></label>
                    </div>

					<div class="col-md-3">
						<input type="checkbox" id="addnotnegotiable" style="" onclick="stamps()"> <label>Not Negotiable</label>
					</div>
					<div class="col-md-3">
						<input type="checkbox" id="addpayonly" style="" onclick="stamps()"> <label>A/C pay only</label>
					</div>
					<div class="col-md-3">
						<input type="checkbox" id="addBearer" style=" " onclick="stamps()"> <label>Strike Bearer</label>
					</div>
					<div class="col-md-3">
						<input type="checkbox" id="addcross" style="" onclick="stamps()"> <label>Cross Cheque</label>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">

					<div class="col-md-3">
						<input type="checkbox" id="addprifix" onclick="addsufix()" style=""> <label>prefix</label>
					</div>
					<div class="col-md-4">
						<input type="checkbox" id="adddoublecross" style="" onclick="stamps()"> <label>Double Cross Cheque</label>
					</div>
					<div class="col-md-2">
						<input type="checkbox" id="addsuffix" onclick="addsufix()" style=""> <label>Suffix</label>
					</div>

					<div class="col-md-3">
						<input type="checkbox" id="remove_currency" style=""> <label>Remove Currency</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-2" style="margin-top: 20px;">
				<button type="button" id="print_date_only" class="btn btn-sm btn-primary btn_get_word">Print Date Only </button>
			</div>
			<div class="col-md-2" style="margin-top: 20px;">
				<button type="button" id="printprevie" class="btn btn-sm btn-warning btn_get_word" onclick="print();">Re-Print </button>
			</div>
			<div class="col-md-2" style="margin-top: 20px;">
				<button type="button" id="printchaque" class="btn btn-sm btn-primary btn_get_word"
					onclick="myFunctionPrint();">Print Cheque</button>
			</div>
			<div class="col-md-2" style="margin-top: 20px;">
				<button type="button" id="printvoucher" class="btn btn-sm btn-primary btn_get_word"
					onclick="myFunctionPrintVoucher()">Print Voucher</button>
			</div>
			<div class="col-md-2"></div>
		</div>
        <div id="cheque-container" class="cheque-container" style="margin-top: 20px; ">
            <div id="template">
                
                <style>
                    .default_fonts{
                        <?php if($default_setting && $default_setting->def_font): ?> font-family:'<?php echo e(str_replace('+',' ',$default_setting->def_font), false); ?>' !important; <?php else: ?> font-family: sans-serif !important;<?php endif; ?>
                    }
                </style>
                <div style="margin: 0px;">
                    <p id="payment-status" class="default_fonts" style="color:black;font-size:13px;"></p>
                    <p id="bank-account-no" class="default_fonts" style="color:black;font-size:13px;"></p>
                </div>
                <input type="hidden" id="amount_word" name="amount_word">
                <div>
                    <p id="pay" class="default_fonts" style="position:absolute;color: black;font-size:14px;"></p>
                </div>
                <div style="display: none;">
                    <p id="date" class="default_fonts" style="position:absolute;color:black;"></p>
                </div>
                <div>
                    <p id="amount" class="default_fonts" style="position:absolute;color:black;font-size:13px;"></p>
                </div>
                <div>
                    <p id="inWords1" class="default_fonts" style="position:absolute; color: black;font-size: 13px;"></p>
                </div>
                <div>
                    <p id="inWords2" class="default_fonts" style="position:absolute; color: black;font-size: 13px;"></p>
                </div>
                <div>
                    <p id="inWords3" class="default_fonts" style="position:absolute; color: black;font-size: 13px;"></p>
                </div>
                <div>
                    <div>
                        <p id="d1" class="default_fonts" style="position:  absolute; color: black; font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="d2" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="m1" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="m2" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="y1" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="y2" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="y3" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="y4" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="ds1" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                    <div>
                        <p id="ds2" class="default_fonts" style="position:  absolute; color: black;font-size: 13px;">
                        </p>
                    </div>
                </div>
                <!-- Dragble Stamp -->
                <!-- <div id="negotiable" style="position:absolute;display: none;">
                    <img src="<?php echo e(asset('chequer/img/Not-Negotiable.png'), false); ?>" style="width: 100%;">
                </div> -->
                <div id="negotiable" class="resizable draggable" contenteditable="false" style="position:absolute;color:black; background-image: url(<?php echo e(asset('chequer/img/Not-Negotiable.png'), false); ?>);background-repeat: no-repeat;height: 30px; width: 120px;display: none; display: none;" onclick="get_aligmentnego();">
                    <!-- <img src="<?php echo e(asset('chequer/img/Not-Negotiable.png'), false); ?>"> -->
                </div>
                <!-- <div id="payonly" style="position:absolute;display: none;">
                    <img src="<?php echo e(asset('chequer/img/pay-only.png'), false); ?>" style="width: 100%;">
                </div> -->
                <div id="payonly" class="resizable draggable" contenteditable="false" style="position:absolute;color:black; background-image: url(<?php echo e(asset('chequer/img/pay-only.png'), false); ?>);background-repeat: no-repeat;height: 30px; width: 120px;display: none; display: none;margin-left:150px;" onclick="get_aligmentpayonly();">
                </div> 
                <div id="cross" style="position:absolute; display: none;">
                    <img src="<?php echo e(asset('chequer/img/cross.png'), false); ?>" style="width: 100%;">
                </div>
                <div id="doublecross" style="position:absolute; display: none;">
                    <img src="<?php echo e(asset('chequer/img/cross.png'), false); ?>" style="width: 110%;">
                </div>
                <div id="strikeBearer" class="" contenteditable="false"
                    style="position:absolute;color:black;display: none;">
                    <hr style="border: 1px solid #000;width: 100px;">
                    </hr>
                </div>
                <div id="Stamp" class="" contenteditable="false" style="display:none;position:absolute;color:black; ">
                    <img src="" id="stamimage">
                </div>
            </div>
        </div>
		<div class="row" id='printvoucherdive'
            style="display:none;background-color:white;height:450px;width:750px;margin-left:150px;">
            <div class="col-md-12">
                <br />
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php
                    foreach($getvoucher as $vaoucherid){}
                    $Currentid=(!empty($vaoucherid['id'])? $vaoucherid['id'] : 0 )+1;
                    $settingData = App\SiteSettings::first();

                    ?>
                    <center>
                        <h2><?php echo e($settingData->site_name, false); ?></h2>
                    </center>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="col-md-12">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>PAYMENT VOUCHER</h4>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 ">
                    <h5 id="voc_no"><b>No:</b> <?php echo e($Currentid, false); ?></h5>
                    <h5 id="datew_id"><b>Date:</b><?php echo e(date('d-m-Y'), false); ?></h5>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>Payee name:</b></label>
                </div>
                <div class="col-md-7">
                    <p id="vou_pyeename"></p>
                </div>
                <div class="col-md-2"></div>
                <br />
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>Amount Number:</b></label>
                </div>
                <div class="col-md-7">
                    <p id="vou_payamnum"></p>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>Amount in word:</b></label>
                </div>
                <div class="col-md-7">
                    <p id="vou_payamnumword"></p>
                </div>
                <div class="col-md-2"></div>
                <br />
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>Chaque no.:</b></label>
                </div>
                <div class="col-md-7">
                    <div class="col-md-7">
                        <p id="vou_chaqno"></p>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <br />
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>Chaque Date:</b></label>
                </div>
                <div class="col-md-7">
                    <div class="col-md-7">
                        <p id="vou_date"><?php echo date('d-m-Y'); ?></p>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <br />
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label><b>On Account of:</b></label>
                </div>
                <div class="col-md-7">
                    <label id="vou_amountof" style="border-bottom: 1px dashed;"></label>
                </div>
                <div class="col-md-2"></div>
                <br />
            </div>
            <input type="hidden" id="def_curnctname" name="def_curnctname" value="<?php echo $def_currency; ?>">
            <div class="col-md-12"></div>
            <div class="col-md-12"><br /><br /><br /><br /></div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <?php // echo $this->session->userdata('user_role_name'); ?>
                    <label style="border-top: 1px dashed;"><b>Prepared by</b></label>
                </div>
                <div class="col-md-3">
                    <label style="border-top: 1px dashed;"><b>Approved by</b></label>
                </div>
                <div class="col-md-2">
                    <label style="border-top: 1px dashed;"><b>signature 1</b></label>
                </div>
                <div class="col-md-2">
                    <label style="border-top: 1px dashed;"><b>signature 2</b></label>
                </div>
                <div class="col-md-2">
                    <label style="border-top: 1px dashed;"><b>Received By</b></label>
                </div>
            </div>
        </div>
        <div class="row"><br /> <br /> <br /> <br /> <br /></div>
        <div class="canvasDiv"></div>


        <?php echo $__env->renderComponent(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/jquery.num2words.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/html2canvas.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/html2canvas.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/currency.js'), false); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#mynumber").on('keyup',function(){
			convertNumberToWords();
		});
		checkstamp('<?php echo $def_stamp; ?>');
		temFunction();

		$.each(currency, function (i, item) {
			$('#currencyTyp').append($('<option>', {
				value: item.name,
				text : item.name,
				symbol : item.symbol
			}));
		});

		$(document).on('blur', '#mydate', function(event){
			temFunction();
		});

		$(document).on('change', '#currencyTyp', function(event) {
			$('#remove_currency').prop('checked', false);
		});

		$(document).on('change', '#remove_currency', function(event) {
			if($(this).prop("checked") == true){
				$('#currencyTyp').val('');
			}
		});
	});
</script>

<script type="text/javascript">
	var th = ['','thousand','million', 'billion','trillion'];
    var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}
    
    function printpayname() {
    var supplier_id = $("#myText").val();
    var paymentFor = $("#payment_for").val();
    var paymentType = $("#payment_type").val();

    if (supplier_id > 0) {
        $("#myText").prop("disabled", true);
    }

    // Enable fields based on payment type and payment for conditions
    if (supplier_id > 0 && paymentFor == 'payment_only' && paymentType == 'new_payment') {
        $("#purchse_bill_no").prop('readonly', false);
        $("#supplier_order_no").prop('readonly', false);
        $("#payable_amount").prop('readonly', false);
    }

    if (paymentType == 'pre_payment') {
        $("#purchse_bill_no").prop('readonly', true);
        $("#payable_amount").prop('readonly', false);
    } else {
        $("#purchse_bill_no").prop('readonly', true);
        $("#supplier_order_no").prop('readonly', true);
        $("#payable_amount").prop('readonly', true);
    }

    // Handling the balance payment condition
    if (supplier_id > 0 && paymentFor == 'purchases' && paymentType == 'balance_payment' && $('#purchase_id').val() > 0) {
        $('#mynumber').prop('readonly', true);
    } else {
        $('#mynumber').prop('readonly', false);
    }

    // Changing labels based on paymentFor
    if (paymentFor == 'expenses') {
        $("#purchse_bill_no_label").text("Expense Ref No:");
        $("#purchase_id_label").text("Select Expense Number:");
    } else {
        $("#purchse_bill_no_label").text("Bill Number:");
        $("#purchase_id_label").text(paymentType == 'new_payment' ? "Purchase Order No" : "Select Purchase Order:");
    }

    $('#purchase_id').prop('disabled', true);
    if (supplier_id > 0 && paymentFor == 'payment_only' && paymentType == 'new_payment') {
        var options2 = '<option value="">Select No</option>';
        $('#purchase_id').html(options2);
        $('#purchase_id').prop('disabled', false);
    } else if (paymentType == 'balance_payment' || paymentType == 'pre_payment') {
        console.log(supplier_id, paymentFor, paymentType)
        // Fetch purchase orders for balance payment
        $.ajax({
            url: "<?php echo e(action('Chequer\ChequeWriteController@listOfPayeeTemp'), false); ?>",
            type: 'post',
            dataType: 'json',
            data: { supplier_id: supplier_id, paymentFor: paymentFor, paymentType: paymentType },
            success: function (result) {
                console.log(result)
                var data2 = result.get_purchase_order.length;
                var options2 = '';
                if (data2 == 0) {
                    options2 += '<option value="">No Purchase Order yet.</option>';
                } else {
                    options2 += '<option value="">Select No</option>';
                    for (var i = 0; i < data2; i++) {
                        options2 += '<option value="' + result.get_purchase_order[i].id + '">' + result.get_purchase_order[i].invoice_no + '</option>';
                    }
                }
                // Populate purchase_id dropdown
                $('#purchase_id').html(options2);
                $('#purchase_id').prop('disabled', false);
            }
        });
    } else {
        // If not balance payment, use the default handling
        $.ajax({
            url: "<?php echo e(action('Chequer\ChequeWriteController@listOfPayeeTemp'), false); ?>",
            type: 'post',
            dataType: 'json',
            data: { supplier_id: supplier_id, paymentFor: paymentFor, paymentType: paymentType },
            success: function (result) {
                var data2 = result.get_purchase_order.length;
                var options2 = '';
                if (data2 == 0) {
                    options2 += '<option value="">No Purchase Order yet.</option>';
                } else {
                    options2 += '<option value="">Select No</option>';
                    for (var i = 0; i < data2; i++) {
                        options2 += '<option value="' + result.get_purchase_order[i].id + '">' + result.get_purchase_order[i].invoice_no + '</option>';
                    }
                }
                // Populate purchase_id dropdown
                $('#purchase_id').html(options2);
                $('#purchase_id').prop('disabled', false);
            }
        });
    }

    $("#pay").html($("#myText :selected").text());
    $("#vou_pyeename").html($("#myText").val());
}

function convertNumberToWords(){
    var payment_type = $("#payment_type").val();
    var valus = $("#mynumber").val();
    var Unpaid = $("#payable_amount").val();
    Unpaid = Unpaid.replace(/,/g, '').split('.')[0];
    if(parseFloat(Unpaid) > parseFloat(valus)){
        if(valus.indexOf('.') !== -1){
            $("#amount").html(commaSeparateNumber(valus));
            $("#vou_payamnum").html(commaSeparateNumber(valus));
        }else{
            $("#amount").html(commaSeparateNumber(valus)+".00");
            $("#vou_payamnum").html(commaSeparateNumber(valus)+".00");
        }
    }else if((parseFloat(Unpaid) == parseFloat(valus)) && (parseFloat(valus) > 0)){
        $("#amount").html(commaSeparateNumber(valus)+".00");
        $("#vou_payamnum").html(commaSeparateNumber(valus)+".00");
    }else if(Unpaid == "" && valus != "" && payment_type=='balance_payment'){
        var purchased = $("#purchase_id option:selected").text();

        if(purchased == 'No Purchase Order yet.'){
            alert("Hello Sir");
        }else{
            alert("Please Select Purchase Order first!");
        }
        $("#mynumber").val('');
    }
   // Assume Unpaid is a variable holding the unpaid amount
if (parseFloat(valus) > parseFloat(Unpaid)) {
    alert("Please enter a value less than or equal to the Unpaid Amount!",Unpaid);
    $("#mynumber").val(''); // Clear the input field
}

    return false;
}
function myFunction() {
    var x = document.getElementById("myText");
    var defaultVal = x.defaultValue;
    var currentVal = x.value;
    var d = document.getElementById("mydate");
    var currentdate = d.value;
    var a = document.getElementById("mynumber");
    var currentnumber = a.value;
    if (defaultVal == currentVal) {
        document.getElementById("demo").innerHTML = "Default value and current value is the same: "
        + x.defaultValue + " and " + x.value
        + "<br>Change the value of the text field to see the difference!";
    } else {
        document.getElementById("pay").innerHTML =currentVal;
        document.getElementById("date").innerHTML = currentdate;
        if($("#currencyType option:selected").attr('symbol') && currentnumber){
            document.getElementById("amount").innerHTML = currentnumber;
        }else{
            document.getElementById("amount").innerHTML = currentnumber;
        }
    }
    $(".addCurrency").html($("#currencyType option:selected").val());
    // myFunctionPrint();
}

function temFunction_old() {
    console.log("cli")
    var template_id = $('#mySelect').val(); 

    if (template_id) {
        $.ajax({
            url: '/get-bank-accounts',
            method: 'GET',
            data: {
                template_id: template_id
            },
            success: function(response) {
                console.log("BA")
                console.log(response)
                $('#bankacount').empty();

                if (response.length === 1) {
                    $('#bankacount').append('<option value="' + response[0].account_number + '">' + response[0].account_number + '</option>');
                } else {
                    $('#bankacount').append('<option value="">Please Select</option>');
                    $.each(response, function(index, bankAccount) {
                        $('#bankacount').append('<option value="' + bankAccount.account_number + '">' + bankAccount.account_number + '</option>');
                    });
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    } else {
        $('#bankacount').empty().append('<option value="">Please select</option>');
    }
}


function myFunctionPrint(){
    var supplierid = $('#getSupplierDate').val();
    var chequeNo = $('#chequeNo').val();
    var purchase_id = $('#purchase_id').val();
    var payable_amount = $('#payable_amount').val();
    var unpaid = $('#payable_amount').val();
    var paymentFor = $("#payment_for").val();
    var paymentType = $("#payment_type").val();
    var paid_to_supplier = $('#paid_to_supplier option:selected').val();
    var paid_amounts = $('#mynumber').val();
    var bank_account_no=$("#bankacount").val();
    
    unpaid = unpaid.replace(/,/g, '').split('.')[0];

    if(chequeNo == ""){
        toastr.error("Check number is required.");
        return;
    }
    if (isNaN(chequeNo)){
        toastr.error("Check number is required.");
        return;
    }
    if(purchase_id == "Select Order NO"){
        alert("Please Select Order NO.");
        return;
    }
    if($('#mynumber').val() == "" || $('#mynumber').val() == 0){
        alert("Please Enter Amount.");
        return;
    }
    if(unpaid != 0){
        if(paid_to_supplier == ""){
            alert("Please Select Payment Status.");
            return;
        }

        if(parseFloat(unpaid.replace(/,/g, "")) < parseFloat(paid_amounts.replace(/,/g, ""))){
            alert("Paid To Supplier amount can't be greater than Unpaid.(" + parseFloat(unpaid.replace(/,/g, "")) + "<" + parseFloat(paid_amounts.replace(/,/g, "")) + ")");
            return;
        }
    }

    if(supplierid != ""){
        $.ajax({
            type: 'POST',
            url: "<?php echo e(action('Chequer\ChequeWriteController@getChequeNoUniqueOrNotCheck'), false); ?>",
            data: { supplierid: supplierid, chequeNo: chequeNo },
            dataType: 'JSON',
            success: function(data){
                if(data.cheque_check != null){
                    alert("Please Enter the correct Cheque No.");
                } else {
                    // Continue with the save process here
                    var template_id = $('#mySelect option:selected').val();
                    var cheque_amount = $('#mynumber').val();
                    var payee = $('#myText').val();
                    var cheque_no = $('#chequeNo').val();
                    var cheque_date = $('#mydate').val();
                    var payee_tempname = $("#payee_tempname").val();
                    var stampvalu = $("#addStamps").val();
                    var amount_word = $("#amount_word").val();
                    var bankacount = $("#bankacount").val();
                    var purchse_bill_no = $("#purchse_bill_no").val();
                    var acoof = $("#acountof").val();
                    $("#vou_date").html(cheque_date);

                    $.ajax({
                        url: "<?php echo e(url('cheque-write'), false); ?>",
                        type: 'POST',
                        dataType: 'json',
                        data: { 
                            paymentType: paymentType, paymentFor: paymentFor, purchse_bill_no: purchse_bill_no,
                            payable_amount: payable_amount, purchase_id: purchase_id, paid_to_supplier: paid_to_supplier,
                            template_id: template_id, cheque_amount: cheque_amount, payee: payee, cheque_no: cheque_no,
                            cheque_date: cheque_date, payee_tempname: payee_tempname, stampvalu: stampvalu,
                            amount_word: amount_word, bankacount: bankacount, acoof: acoof
                        },
                        error: function (jqXHR, exception) {
                            console.log(jqXHR, exception);
                        }
                    }).done(function(data) {
                        // Confirmation just before the print
                        if (confirm("Do you want to proceed with printing?")) {
                            var divToPrint = document.getElementById('template');
                             var newWin=window.open('','Print-Window');
                        var printContent = '<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>';
                        
                        newWin.document.open();
                        newWin.document.write(printContent);
                        newWin.document.close();
                            
                        // Redirect after successful print
                        // window.location.href = '/cancell_cheque_details';
                        window.location.reload(true);

                        } else {
                             $('#bank_to_write_cheques').show();
                            // If user cancels, return without printing
                            return;
                        }
                    });
                }
            }
        });
    } else {
        alert("Please Enter the correct Cheque No.");
    }
}


function myFunctionPrint333(){
    var template_id = $('#mySelect option:selected').val();
    var cheque_amount  = $('#mynumber').val();
    // var payee = $('#myText option:selected').text();
    var payee = $('#myText').val();
    var cheque_no = $('#chequeNo').val();
    var cheque_date = $('#mydate').val();
    var paymentFor = $('#payment_for').val();
    var paymentType = $("#payment_type").val();
    var payee_tempname=$("#payee_tempname").val();
    var stampvalu=$("#addStamps").val();
    var amount_word=$("#amount_word").val();
    var bankacount=$("#bankacount").val();
    var acoof=$("#acountof").val();
    $("#vou_date").html(cheque_date);

    $.ajax({
        url: "<?php echo e(url('cheque-write'), false); ?>",
        type: 'post',
        dataType: 'json',
        data: {paymentType:paymentType,paymentFor:paymentFor,template_id: template_id,cheque_amount: cheque_amount ,payee: payee,cheque_no: cheque_no,cheque_date: cheque_date,payee_tempname:payee_tempname,stampvalu:stampvalu,amount_word:amount_word,bankacount:bankacount,acoof:acoof},
    }).done(function(data) {
        location.reload();
        var divToPrint=document.getElementById('template');
        var newWin=window.open('','Print-Window');

        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
    });
}

//Print Voucher
function myFunctionPrintVoucher() {
    var supplierid = $("#myText").val();
    var chequeNo = $('#chequeNo').val();
    var unpaid = $('#payable_amount').val();
    var paid_to_supplier = $('#paid_to_supplier').val();
    var purchase_id = $('#purchase_id').val();
    var paymentFor = $("#payment_for").val();
    var paymentType = $("#payment_type").val();
    var payable_amount = $('#payable_amount').val();
    var bank_account_no = $("#bankacount").val();
    var amount_word=$("#amount_word").val();

    if (unpaid != 0) {
        if (paid_to_supplier == "") {
            alert("Please select Payment Status.");
            return;
        }
        if (parseFloat(unpaid.replace(/,/g, "")) < parseFloat(paid_to_supplier.replace(/,/g, ""))) {
            alert("Paid To Supplier amount can't be greater than Unpaid.(" + parseFloat(unpaid.replace(/,/g, "")) + "<" + parseFloat(paid_amounts.replace(/,/g, "")) + ")");
            return;
        }
    }
    if(chequeNo == ""){
        toastr.error("Check number is required.");
        return;
    }
    if (isNaN(chequeNo)){
        toastr.error("Check number is required.");
        return;
    }
    console.log(supplierid, chequeNo)

    if (supplierid != "") {
        $.ajax({
            type: 'POST',
            url: "<?php echo e(action('Chequer\ChequeWriteController@getChequeNoUniqueOrNotCheck'), false); ?>",
            data: { supplierid: supplierid, chequeNo: chequeNo },
            dataType: 'JSON',
            success: function (data) {
                console.log(data)
                if (data.cheque_check != null) {
                    alert("Please enter a valid Cheque No");
                    return;
                }

                $("#printvoucherdive").css('display', 'block');
                var template_id = $('#mySelect option:selected').val();
                var cheque_amount = $('#mynumber').val();
                var payee = $('#myText option:selected').val();
                var cheque_no = $('#chequeNo').val();
                var cheque_date = $('#mydate').val();

                $.ajax({
                    url: "<?php echo e(url('cheque-write'), false); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        paymentType: paymentType,
                        paymentFor: paymentFor,
                        payable_amount: payable_amount,
                        purchase_id: purchase_id,
                        paid_to_supplier: paid_to_supplier,
                        template_id: template_id,
                        cheque_amount: cheque_amount,
                        payee: payee,
                        cheque_no: cheque_no,
                        cheque_date: cheque_date,
                        bankacount: bank_account_no,
                        amount_word:amount_word
                    },
                    success: function (data) {
                        // Handle the successful response if needed
                    },
                    error: function (data) {
                        console.error('Error:', data);
                    }
                }).done(function (data) {
                    $("#vou_pyeename").html($("#myText :selected").text());
                    const amount_value = $("#mynumber").val().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    $("#vou_payamnum").html(amount_value + ".00");

                    // Capture the voucher as an image
                    html2canvas(document.querySelector("#printvoucherdive")).then(canvas => {
                        $("#printvoucherdive").css('display', 'none'); // Hide before printing
                        var myImage = canvas.toDataURL("image/png");

                        // Open a new window to print
                        var tWindow = window.open("", "", "width=900,height=600");
                        tWindow.document.write('<html><head><title>Print Voucher</title></head><body>');
                        tWindow.document.write('<img id="Image" src="' + myImage + '" style="width:100%;"></body></html>');
                        tWindow.document.close(); // Close the document

                        // Wait for the content to load and then print
                        tWindow.onload = function() {
                            tWindow.print();
                            tWindow.focus();
                            // Optional: Delay the closing to ensure print completes
                            setTimeout(function() {
                                tWindow.close(); // Close the window after a delay
                            }, 1000); // 1-second delay, adjust as needed
                        };
                    });
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    } else {
        alert("Please enter a valid Cheque No");
    }
}

function getchaqudata(){
    var chaqdata=$("#chequeNo").val();
    $("#vou_chaqno").html(chaqdata);
}

function stamps() {
    var checkBox = document.getElementById("addnotnegotiable");
    var text = document.getElementById("negotiable");
    if (checkBox.checked == true){
        negotiable.style.display = "block";
    } else {
        negotiable.style.display = "none";
    }

    var checkBox = document.getElementById("addpayonly");
    var text = document.getElementById("payonly");
    if (checkBox.checked == true){
        payonly.style.display = "block";
    } else {
        payonly.style.display = "none";
    }

    var checkBox = document.getElementById("addcross");
    var text = document.getElementById("cross");
    if (checkBox.checked == true){
        cross.style.display = "block";
    } else {
        cross.style.display = "none";
    }

    var checkBox = document.getElementById("adddoublecross");
    var text = document.getElementById("doublecross");
    if (checkBox.checked == true){
        cross.style.display = "block";
        $("#doublecross").show()
    } else {
        $("#doublecross").hide()
    }

    var checkBox = document.getElementById("addBearer");
    if (checkBox.checked == true){
        $("#strikeBearer").show()
    } else {
        $("#strikeBearer").hide()
    }
}

function checkstamp(value){
    var addStamps = $("#addStamps :selected").val();
    if (addStamps!=""){
        $("#Stamp").show();
        $("#stamimage").attr("src",addStamps);
    } else {
        $("#Stamp").hide();
    }
}
function temFunction() {
    var templtID = $('#mySelect :selected').val();
    console.log('bank account');
    if(templtID > 0){
        $.ajax({
            url: "<?php echo e(action('Chequer\ChequeWriteController@getTempleteWiseBankAccounts'), false); ?>",
            type: 'post',
            dataType: 'json',
            data: {templtID: templtID},
        }).done(function(data) {
            $('#bankacount').html(data.banks);
            getBankNextChequedNO();
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        });
    }

    var t = document.getElementById("mySelect").value;
    var element = document.getElementById("template");
    element.className=t;
    var id = $('#mySelect :selected').val();
    $.ajax({
        url: "<?php echo e(action('Chequer\ChequeTemplateController@getTemplateValues'), false); ?>",
        type: 'post',
        dataType: 'json',
        data: {id: id},
    }).done(function(data) {
        if (!$.trim(data))
            return false;
        var template_size = data.template_size.split(',');
        $('#template').css('width', template_size[0]);
        $('#template').css('height', template_size[1]);
        $('#template').css('background-image', 'url(<?php echo e(url('/public/chequer'), false); ?>/uploads/' + data.image_url + ')');
        var pay_name = data.pay_name.split(',');
        $('#pay').css('margin-top', pay_name[0]);
        $('#pay').css('margin-left', pay_name[1]);
        var date_pos = data.date_pos.split(',');
        $('#date').css('margin-top', date_pos[0]);
        $('#date').css('margin-left', date_pos[1]);
        var amount = data.amount.split(',');
        $('#amount').css('margin-top', amount[0]);
        $('#amount').css('margin-left', amount[1]);
        var amount_in_w1 = data.amount_in_w1.split(',');
        $('#inWords1').css('margin-top', amount_in_w1[0]);
        $('#inWords1').css('margin-left', amount_in_w1[1]);
        var amount_in_w2 = data.amount_in_w2.split(',');
        $('#inWords2').css('margin-top', amount_in_w2[0]);
        $('#inWords2').css('margin-left', amount_in_w2[1]);
        var amount_in_w3 = data.amount_in_w3.split(',');
        $('#inWords3').css('margin-top', amount_in_w3[0]);
        $('#inWords3').css('margin-left', amount_in_w3[1]);
        var not_negotiable = data.not_negotiable.split(',');
        $('#negotiable').css('margin-top', not_negotiable[0]);
        $('#negotiable').css('margin-left', not_negotiable[1]);
        var pay_only = data.pay_only.split(',');
        $('#payonly').css('margin-top', pay_only[0]);
        $('#payonly').css('margin-left', pay_only[1]);
        var template_cross = data.template_cross.split(',');
        $('#cross').css('margin-top', template_cross[0]);
        $('#cross').css('margin-left', template_cross[1]);
        var template_cross = data.template_cross.split(',');
        $('#doublecross').css('margin-top', template_cross[0]);
        $('#doublecross').css('margin-left', template_cross[1]);
        var template_signature_stamp = data.signature_stamp.split(',');
        var template_signature_stamp_area = data.signature_stamp_area.split(',');

        $('#Stamp').css('margin-top', template_signature_stamp[0]);
        $('#Stamp').css('margin-left', template_signature_stamp[1]);
        $('#Stamp').css('height', template_signature_stamp_area[0]);
        $('#Stamp').css('width', template_signature_stamp_area[1]);
        $('#stamimage').css('height', template_signature_stamp_area[0]);
        $('#stamimage').css('width', template_signature_stamp_area[1]);

        if(data.strikeBearer){
            var template_strikeBearer = data.strikeBearer.split(',');
            $('#strikeBearer').css('margin-top', template_strikeBearer[0]);
            $('#strikeBearer').css('margin-left', template_strikeBearer[1]);
        }

        if($("#mydate").is(":visible") && $("#mydate").val()){
            var date = $("#mydate").val();
            var parts = date.split('-');
            var day = parts[2];
            var month = parts[1];
            var year = parts[0];

            var dateParts = day.split('');

            var d1 = data.d1.split(',');
            $('#d1').text(dateParts[0]);
            $('#d1').css('margin-top', d1[0]);
            $('#d1').css('margin-left', d1[1]);

            var d2 = data.d2.split(',');
            $('#d2').text(dateParts[1]);
            $('#d2').css('margin-top', d2[0]);
            $('#d2').css('margin-left', d2[1]);

            var monthParts = month.split('');

            var m1 = data.m1.split(',');
            $('#m1').text(monthParts[0]);
            $('#m1').css('margin-top', m1[0]);
            $('#m1').css('margin-left', m1[1]);

            var m2 = data.m2.split(',');
            $('#m2').text(monthParts[1]);
            $('#m2').css('margin-top', m2[0]);
            $('#m2').css('margin-left', m2[1]);

            var yearParts = year.split('');

            var y1 = data.y1.split(',');
            if(y1=='0px,0px'){
                $('#y1').hide();
            }else{
                $('#y1').text(yearParts[0]);
                $('#y1').css('margin-top', y1[0]);
                $('#y1').css('margin-left', y1[1]);
            }

            var y2 = data.y2.split(',');
            if(y2=='0px,0px'){
                $('#y2').hide();
            }else{
                $('#y2').text(yearParts[1]);
                $('#y2').css('margin-top', y2[0]);
                $('#y2').css('margin-left', y2[1]);
            }

            var y3 = data.y3.split(',');
            $('#y3').text(yearParts[2]);
            $('#y3').css('margin-top', y3[0]);
            $('#y3').css('margin-left', y3[1]);

            var y4 = data.y4.split(',');
            $('#y4').text(yearParts[3]);
            $('#y4').css('margin-top', y4[0]);
            $('#y4').css('margin-left', y4[1]);

            if(data.seprator){
                var ds1 = data.ds1.split(',');
                $('#ds1').text(data.seprator);
                $('#ds1').css('margin-top', ds1[0]);
                $('#ds1').css('margin-left', ds1[1]);

                var ds2 = data.ds2.split(',');
                $('#ds2').text(data.seprator);
                $('#ds2').css('margin-top', ds2[0]);
                $('#ds2').css('margin-left', ds2[1]);
            }
            console.log(dateParts);
        }else{
            $('#y1').text('');
            $('#y2').text('');
            $('#y3').text('');
            $('#y4').text('');
            $('#m1').text('');
            $('#m2').text('');
            $('#d1').text('');
            $('#d2').text('');
            $('#ds1').text('');
            $('#ds2').text('');

        }
    }).fail(function() {
        console.log("error");
    }).always(function() {
        console.log("complete");
    });
}
function printacountfo(){
    var acoof=$("#acountof").val();
    $("#vou_amountof").html(acoof);
}
function commaSeparateNumber(val){
	while (/(\d+)(\d{3})/.test(val.toString())){
		val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
	}
	return val;
}
function checkcurrency(){
    $("#inWords1").show();
    $("#amount").show();
    var currencyType = $("#currencyType :selected").val();
    var def_curnctname = $("#def_curnctname").val();

    if ($("#remove_currency").is(':checked')){
    }else{
        var intl = $("#amount_word").val();
        var amouintwpord1 = intl.replace(def_curnctname,'').replace("Only",'');
        var newamount = amouintwpord1+' '+currencyType+' '+"Only";
        $("#amount_word").val(newamount);
        var words = $.trim(newamount).split(" ");
        var wordlen = words.length;

        if(wordlen==1){
            $("#inWords1").html("");
            $("#inWords2").html("");
            $("#inWords3").html("");
        }else if(wordlen>18){
            var all = newamount.split(" ");
            var first = all.slice(0,8).join();
            var second = all.slice(8,16).join();
            var three = all.slice(16).join();

            $("#inWords1").html(first.replace(/,/g , ' '));
            $("#inWords2").html(second.replace(/,/g , ' '));
            $("#inWords3").html(three.replace(/,/g , ' '));
        }else if( wordlen>10 && wordlen<=18 ){
            var all = newamount.split(" ");
            var first = all.slice(0,8).join();
            var second = all.slice(8).join();

            $("#inWords1").html(first.replace(/,/g , ' '));
            $("#inWords2").html(second.replace(/,/g , ' '));
            $("#inWords3").html("");
        }else{
            $("#inWords1").html(newamount);
            $("#inWords2").html("");
            $("#inWords3").html("");
        }
    }
}
function print(){
	var divToPrint=document.getElementById('template');
	var newWin=window.open('','Print-Window');

	newWin.document.open();
	newWin.document.write('<html><body onload="window.print()" style="margin-top:15px,margin-left:35px;">'+divToPrint.innerHTML+'</body></html>');
	newWin.document.close();
}

function getSupplierBillNoAndOrderNo(){
	var purchase_id=$("#purchase_id").val();
	if(purchase_id=='no_purchase_order'){
		$("#purchse_bill_no").prop('readonly',false);
		$("#supplier_order_no").prop('readonly',false);
		$("#payable_amount").prop('readonly',false);
	}
	if($("#myText").val()>0 && $("#payment_for").val()=='purchases' && ($("#payment_type").val()=='balance_payment' || $("#payment_type").val()=='pre_payment') && $('#purchase_id').val()>0)
	{
		$('#mynumber').prop('readonly', true);
	}else{
		$('#mynumber').prop('readonly', false);
	}
	if(purchase_id > 0){
	    console.log(purchase_id);
		$.ajax({
			url: "<?php echo e(action('Chequer\ChequeWriteController@getPurchaseOrderDataById'), false); ?>",
			type: 'post',
			dataType: 'json',
			data:{purchase_id:purchase_id},
			success: function(result) {

				if(result.purchase_bill_no){
					$("#purchse_bill_no").val(result.purchase_bill_no);
					$("#purchse_bill_no").attr("style", "pointer-events: none;");
					$("#purchse_bill_no").attr("readonly","readonly");
				}else{
					$("#purchse_bill_no").val("");
					$("#purchse_bill_no").removeAttr("style");
					$("#purchse_bill_no").removeAttr("readonly");
				}

				if(result.supplier_order_no){
					$("#supplier_order_no").val(result.results[0].supplier_order_no);
					$("#supplier_order_no").attr("style", "pointer-events: none;");
					$("#supplier_order_no").attr("readonly","readonly");
				}else{
					$("#supplier_order_no").val("");
					$("#supplier_order_no").removeAttr("style");
					$("#supplier_order_no").removeAttr("readonly");
				}
				let dueAmount = result.dueamount;
				$("#payable_amount").val(formatNumber(dueAmount));
			}
		});
	}

}
    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

function loadprintpage(){
	var t = document.getElementById("mySelect").value;
	var element = document.getElementById("template");
	element.className=t;
	var id = $('#mySelect :selected').val();
	$.ajax({
		url: "<?php echo e(action('Chequer\ChequeTemplateController@getTemplateValues'), false); ?>",
		type: 'post',
		dataType: 'json',
		data: {id: id},
	}).done(function(data) {
		if (!$.trim(data))
			return false;
		var template_size = data.template_size.split(',');
		$('#template').css('width', template_size[0]);
		$('#template').css('height', template_size[1]);
		$('#template').css('background-image', 'url(<?php echo e(url("/public/chequer"), false); ?>/uploads/' + data.image_url + ')');
		var pay_name = data.pay_name.split(',');
		$('#pay').css('margin-top', pay_name[0]);
		$('#pay').css('margin-left', pay_name[1]);
		var date_pos = data.date_pos.split(',');
		$('#date').css('margin-top', date_pos[0]);
		$('#date').css('margin-left', date_pos[1]);
		var amount = data.amount.split(',');

		$('#amount').css('margin-top', amount[0]);
		$('#amount').css('margin-left', amount[1]);
		var amount_in_w1 = data.amount_in_w1.split(',');

		$('#inWords1').css('margin-top', amount_in_w1[0]);
		$('#inWords1').css('margin-left', amount_in_w1[1]);
		var amount_in_w2 = data.amount_in_w2.split(',');
		$('#inWords2').css('margin-top', amount_in_w2[0]);
		$('#inWords2').css('margin-left', amount_in_w2[1]);
		var amount_in_w3 = data.amount_in_w3.split(',');
		$('#inWords3').css('margin-top', amount_in_w3[0]);
		$('#inWords3').css('margin-left', amount_in_w3[1]);
		var not_negotiable = data.not_negotiable.split(',');
		$('#negotiable').css('margin-top', not_negotiable[0]);
		$('#negotiable').css('margin-left', not_negotiable[1]);
		var pay_only = data.pay_only.split(',');
		$('#payonly').css('margin-top', pay_only[0]);
		$('#payonly').css('margin-left', pay_only[1]);
		var template_cross = data.template_cross.split(',');
		$('#cross').css('margin-top', template_cross[0]);
		$('#cross').css('margin-left', template_cross[1]);
		var template_cross = data.template_cross.split(',');
		$('#doublecross').css('margin-top', template_cross[0]);
		$('#doublecross').css('margin-left', template_cross[1]);
		var template_signature_stamp = data.signature_stamp.split(',');
		var template_signature_stamp_area = data.signature_stamp_area.split(',');

		$('#Stamp').css('margin-top', template_signature_stamp[0]);
		$('#Stamp').css('margin-left', template_signature_stamp[1]);
		$('#Stamp').css('height', template_signature_stamp_area[0]);
		$('#Stamp').css('width', template_signature_stamp_area[1]);
		$('#stamimage').css('height', template_signature_stamp_area[0]);
		$('#stamimage').css('width', template_signature_stamp_area[1]);
		if(data.strikeBearer){
			var template_strikeBearer = data.strikeBearer.split(',');
			$('#strikeBearer').css('margin-top', template_strikeBearer[0]);
			$('#strikeBearer').css('margin-left', template_strikeBearer[1]);
		}
		if($("#mydate").val()){
			var date = $("#mydate").val();
			var parts = date.split('-');
			var day = parts[0];
			var month = parts[1];
			var year = parts[2];

			var dateParts = day.split('');

			var d1 = data.d1.split(',');
			$('#d1').text(dateParts[0]);
			$('#d1').css('margin-top', d1[0]);
			$('#d1').css('margin-left', d1[1]);

			var d2 = data.d2.split(',');
			$('#d2').text(dateParts[1]);
			$('#d2').css('margin-top', d2[0]);
			$('#d2').css('margin-left', d2[1]);

			var monthParts = month.split('');

			var m1 = data.m1.split(',');
			$('#m1').text(monthParts[0]);
			$('#m1').css('margin-top', m1[0]);
			$('#m1').css('margin-left', m1[1]);

			var m2 = data.m2.split(',');
			$('#m2').text(monthParts[1]);
			$('#m2').css('margin-top', m2[0]);
			$('#m2').css('margin-left', m2[1]);

			var yearParts = year.split('');

			var y1 = data.y1.split(',');
			if(y1=='0px,0px'){
				$('#y1').hide();
			}else{
				$('#y1').text(yearParts[0]);
				$('#y1').css('margin-top', y1[0]);
				$('#y1').css('margin-left', y1[1]);
			}

			var y2 = data.y2.split(',');
			if(y2=='0px,0px'){
				$('#y2').hide();
			}else{
				$('#y2').text(yearParts[1]);
				$('#y2').css('margin-top', y2[0]);
				$('#y2').css('margin-left', y2[1]);
			}

			var y3 = data.y3.split(',');
			$('#y3').text(yearParts[2]);
			$('#y3').css('margin-top', y3[0]);
			$('#y3').css('margin-left', y3[1]);

			var y4 = data.y4.split(',');
			$('#y4').text(yearParts[3]);
			$('#y4').css('margin-top', y4[0]);
			$('#y4').css('margin-left', y4[1]);

			if(data.seprator){
				var ds1 = data.ds1.split(',');
				$('#ds1').text(data.seprator);
				$('#ds1').css('margin-top', ds1[0]);
				$('#ds1').css('margin-left', ds1[1]);

				var ds2 = data.ds2.split(',');
				$('#ds2').text(data.seprator);
				$('#ds2').css('margin-top', ds2[0]);
				$('#ds2').css('margin-left', ds2[1]);
			}
			/* console.log(dateParts); */
		}
	}).fail(function() {
		console.log("error");
	}).always(function() {
		console.log("complete");
	});

	var valusesstamp=$("#addStamps").val();
}


function paytemfetch(id,chaqueid){
	var t = document.getElementById("mySelect").value;
	var element = document.getElementById("template");
	element.className=t;

	var id = id;
	$.ajax({
		url: "<?php echo e(action('Chequer\ChequeWriteController@getTemplatechaque'), false); ?>",
		type: 'post',
		dataType: 'json',
		data: {id: id,chaqueid:chaqueid},
	}).done(function(data) {
		if (!$.trim(data))
			return false;
		var template_size = data.template_size.split(',');
		$('#template').css('width', template_size[0]);
		$('#template').css('height', template_size[1]);
		$('#template').css('background-image', 'url(url("/public/chequer")}}uploads/' + data.image_url + ')');
		var pay_name = data.pay_name.split(',');
		$('#pay').css('margin-top', pay_name[0]);
		$('#pay').css('margin-left', pay_name[1]);
		var date_pos = data.date_pos.split(',');
		$('#date').css('margin-top', date_pos[0]);
		$('#date').css('margin-left', date_pos[1]);
		var amount = data.amount.split(',');
		$('#amount').css('margin-top', amount[0]);
		$('#amount').css('margin-left', amount[1]);
		var amount_in_w1 = data.amount_in_w1.split(',');
		$('#inWords1').css('margin-top', amount_in_w1[0]);
		$('#inWords1').css('margin-left', amount_in_w1[1]);
		var amount_in_w2 = data.amount_in_w2.split(',');
		$('#inWords2').css('margin-top', amount_in_w2[0]);
		$('#inWords2').css('margin-left', amount_in_w2[1]);
		var amount_in_w3 = data.amount_in_w3.split(',');
		$('#inWords3').css('margin-top', amount_in_w3[0]);
		$('#inWords3').css('margin-left', amount_in_w3[1]);
		var not_negotiable = data.not_negotiable.split(',');
		$('#negotiable').css('margin-top', not_negotiable[0]);
		$('#negotiable').css('margin-left', not_negotiable[1]);
		var pay_only = data.pay_only.split(',');
		$('#payonly').css('margin-top', pay_only[0]);
		$('#payonly').css('margin-left', pay_only[1]);
		var template_cross = data.template_cross.split(',');
		$('#cross').css('margin-top', template_cross[0]);
		$('#cross').css('margin-left', template_cross[1]);
		var template_cross = data.template_cross.split(',');
		$('#doublecross').css('margin-top', template_cross[0]);
		$('#doublecross').css('margin-left', template_cross[1]);
		var template_signature_stamp = data.signature_stamp.split(',');
		var template_signature_stamp_area = data.signature_stamp_area.split(',');

		$('#Stamp').css('margin-top', template_signature_stamp[0]);
		$('#Stamp').css('margin-left', template_signature_stamp[1]);
		$('#Stamp').css('height', template_signature_stamp_area[0]);
		$('#Stamp').css('width', template_signature_stamp_area[1]);
		$('#stamimage').css('height', template_signature_stamp_area[0]);
		$('#stamimage').css('width', template_signature_stamp_area[1]);

		if(data.strikeBearer){
			var template_strikeBearer = data.strikeBearer.split(',');
			$('#strikeBearer').css('margin-top', template_strikeBearer[0]);
			$('#strikeBearer').css('margin-left', template_strikeBearer[1]);
		}

		if($("#mydate").val()){
			var date = $("#mydate").val();
			var parts = date.split('-');
			var day = parts[0];
			var month = parts[1];
			var year = parts[2];

			var dateParts = day.split('');

			var d1 = data.d1.split(',');
			$('#d1').text(dateParts[0]);
			$('#d1').css('margin-top', d1[0]);
			$('#d1').css('margin-left', d1[1]);

			var d2 = data.d2.split(',');
			$('#d2').text(dateParts[1]);
			$('#d2').css('margin-top', d2[0]);
			$('#d2').css('margin-left', d2[1]);

			var monthParts = month.split('');

			var m1 = data.m1.split(',');
			$('#m1').text(monthParts[0]);
			$('#m1').css('margin-top', m1[0]);
			$('#m1').css('margin-left', m1[1]);

			var m2 = data.m2.split(',');
			$('#m2').text(monthParts[1]);
			$('#m2').css('margin-top', m2[0]);
			$('#m2').css('margin-left', m2[1]);

			var yearParts = year.split('');

			var y1 = data.y1.split(',');
			if(y1=='0px,0px'){
				$('#y1').hide();
			}else{
				$('#y1').text(yearParts[0]);
				$('#y1').css('margin-top', y1[0]);
				$('#y1').css('margin-left', y1[1]);
			}

			var y2 = data.y2.split(',');
			if(y2=='0px,0px'){
				$('#y2').hide();
			}else{
				$('#y2').text(yearParts[1]);
				$('#y2').css('margin-top', y2[0]);
				$('#y2').css('margin-left', y2[1]);
			}

			var y3 = data.y3.split(',');
			$('#y3').text(yearParts[2]);
			$('#y3').css('margin-top', y3[0]);
			$('#y3').css('margin-left', y3[1]);

			var y4 = data.y4.split(',');
			$('#y4').text(yearParts[3]);
			$('#y4').css('margin-top', y4[0]);
			$('#y4').css('margin-left', y4[1]);

			if(data.seprator){
				var ds1 = data.ds1.split(',');
				$('#ds1').text(data.seprator);
				$('#ds1').css('margin-top', ds1[0]);
				$('#ds1').css('margin-left', ds1[1]);

				var ds2 = data.ds2.split(',');
				$('#ds2').text(data.seprator);
				$('#ds2').css('margin-top', ds2[0]);
				$('#ds2').css('margin-left', ds2[1]);
			}
			console.log(dateParts);
		}
	}).fail(function() {
		console.log("error");
	}).always(function() {
		console.log("complete");
	});
}
function getBankNextChequedNO(){
			var bankacounts = $("#bankacount :selected").val();
			if(bankacounts){
				$.ajax({
					url: "<?php echo e(action('Chequer\ChequeWriteController@getNextChequedNO'), false); ?>",
					type: 'post',
					data: {bankacount: bankacounts},
					success:function(data){
                        console.log('data', data)
						if(data.success){
                                console.log('$("#chequeNo")', $("#chequeNo"))
                                console.log('data', data.next_cheque_no)
								if (data == 0) {
                                    $("#chequeNo").val(data);
                                } else{
                                    $("#chequeNo").val(data.next_cheque_no);
                                }
                                getchaqudata();
							// if(data.length == 1){
							// 	$("#chequeNo").val(data.next_cheque_no);
							// }else if(data.length == 2){
							// 	$("#chequeNo").val('0'+data);
							// }else{
							// 	$("#chequeNo").val(data);
							// }
							$("#chequeNo").attr("style", "pointer-events: none;");
							$("#chequeNo").attr("readonly","readonly");
						}else{
						    toastr.error(data.msg);
							$("#chequeNo").val("");
                            getchaqudata();
							// $("#chequeNo").removeAttr("style");
							// $("#chequeNo").removeAttr("readonly");
						}
					}
				});
			}
		}
function addsufix(){
	var checkBox = document.getElementById("addsuffix");
	var checkBox1 = document.getElementById("addprifix");
	if (checkBox.checked == true && checkBox1.checked == true){
		var addsuffix="**";
		var addprefix="**";
		var amouintwpord=$("#amount_word").val();
		var amountnum=$("#mynumber").val();
		if(amountnum.indexOf('.') !== -1){
			var numsifix=addprefix+amountnum+addsuffix;
			$("#amount").html(commaSeparateNumber(amountnum));
			$("#vou_payamnum").html(commaSeparateNumber(amountnum));
		}else{
			var numsifix=addprefix+amountnum+".00"+addsuffix;
			$("#amount").html(commaSeparateNumber(amountnum)+".00");
			$("#vou_payamnum").html(commaSeparateNumber(amountnum)+".00");
		}

		var newamount=addprefix+' '+amouintwpord+' '+addsuffix;
		$("#amount").html(numsifix);
		$("#amount_word").val();

		var words = $.trim(newamount).split(" ");
		var wordlen=words.length;
		if(wordlen==1){
			$("#inWords1").html("");
			$("#inWords2").html("");
			$("#inWords3").html("");
		}else if(wordlen>18){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8,16).join();
			var three = all.slice(16).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html(three.replace(/,/g , ' '));
		}else if( wordlen>10 && wordlen<=18 ){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html("");
		}else{
			$("#inWords1").html(newamount);
			$("#inWords2").html("");
			$("#inWords3").html("");
		}
	}else if (checkBox.checked == true && checkBox1.checked == false){
		var addsuffix="***";
		var amouintwpord=$("#amount_word").val();
		var amountnum=$("#mynumber").val();
		var newamount=amouintwpord+' '+addsuffix;
		if(amountnum.indexOf('.') !== -1){
			var numsifix=amountnum+addsuffix;
			$("#amount").html(commaSeparateNumber(amountnum));
			$("#vou_payamnum").html(commaSeparateNumber(amountnum));
		}else{
			var numsifix=amountnum+".00"+addsuffix;
			$("#amount").html(commaSeparateNumber(amountnum)+".00");
			$("#vou_payamnum").html(commaSeparateNumber(amountnum)+".00");
		}

		$("#amount").html(numsifix);
		$("#amount_word").val();
		var words = $.trim(newamount).split(" ");
		var wordlen=words.length;
		if(wordlen==1){
			$("#inWords1").html("");
			$("#inWords2").html("");
			$("#inWords3").html("");
		}else if(wordlen>18){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8,16).join();
			var three = all.slice(16).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html(three.replace(/,/g , ' '));
		}else if( wordlen>10 && wordlen<=18 ){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html("");
		}else{
			$("#inWords1").html(newamount);
			$("#inWords2").html("");
			$("#inWords3").html("");
		}
	} else if (checkBox.checked == false && checkBox1.checked == true){
		var addsuffix="***";
		var addprefix="**";

		var amouintwpord=$("#amount_word").val();
		var amountnum=$("#mynumber").val();
		var newamount=addprefix+''+amouintwpord;
		if(amountnum.indexOf('.') !== -1){
			var numsifix=addprefix+amountnum;
			$("#amount").html(commaSeparateNumber(amountnum));
			$("#vou_payamnum").html(commaSeparateNumber(amountnum));
		}else{
			var numsifix=addprefix+amountnum+".00";
			$("#amount").html(commaSeparateNumber(amountnum)+".00");
			$("#vou_payamnum").html(commaSeparateNumber(amountnum)+".00");
		}

		$("#amount").html(numsifix);
		$("#amount_word").val();
		var words = $.trim(newamount).split(" ");
		var wordlen=words.length;
		if(wordlen==1){
			$("#inWords1").html("");
			$("#inWords2").html("");
			$("#inWords3").html("");
		}else if(wordlen>18){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8,16).join();
			var three = all.slice(16).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html(three.replace(/,/g , ' '));
		}else if( wordlen>10 && wordlen<=18 ){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html("");
		}else{
			$("#inWords1").html(newamount);
			$("#inWords2").html("");
			$("#inWords3").html("");
		}
	} else {
		var addsuffix="***";
		var amouintwpord=$("#amount_word").val();
		var amountnum=$("#mynumber").val();
		$("#amount").html(amountnum);
		var newamount=amouintwpord;
		$("#amount_word").val();

		var words = $.trim(newamount).split(" ");
		var wordlen=words.length;
		if(wordlen==1){
			$("#inWords1").html("");
			$("#inWords2").html("");
			$("#inWords3").html("");
		}else if(wordlen>18){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8,16).join();
			var three = all.slice(16).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html(three.replace(/,/g , ' '));
		}else if( wordlen>10 && wordlen<=18 ){
			var all = newamount.split(" ");
			var first = all.slice(0,8).join();
			var second = all.slice(8).join();

			$("#inWords1").html(first.replace(/,/g , ' '));
			$("#inWords2").html(second.replace(/,/g , ' '));
			$("#inWords3").html("");
		}else{
			$("#inWords1").html(newamount);
			$("#inWords2").html("");
			$("#inWords3").html("");
		}
	}
}
</script>
<script>
	$(document).ready(function(){

		checkcurrency();

	$("#inWords1").html("");
	$("#amount").html("");
	$('#remove_currency').click(function(){
		$("#inWords1").show();
		$("#amount").show();
		if($(this).is(":checked")){
			var amouintwpord=$("#amount_word").val();
			var def_curnctname=$("#def_curnctname").val();
			var currencyType=$("#currencyType option:selected").val();
			$("#currencyType").val('');
			var amouintwpord1=amouintwpord.replace(currencyType,'');
			var amouintwpord=$("#amount_word").val(amouintwpord1);

			var words = $.trim(amouintwpord1).split(" ");
			var wordlen=words.length;
			if(wordlen==1){
				$("#inWords1").html("");
				$("#inWords2").html("");
				$("#inWords3").html("");
			}else if(wordlen>18){
				var all = amouintwpord1.split(" ");
				var first = all.slice(0,8).join();
				var second = all.slice(8,16).join();
				var three = all.slice(16).join();

				$("#inWords1").html(first.replace(/,/g , ' '));
				$("#inWords2").html(second.replace(/,/g , ' '));
				$("#inWords3").html(three.replace(/,/g , ' '));
			}else if( wordlen>10 && wordlen<=18 ){
				var all = amouintwpord1.split(" ");
				var first = all.slice(0,8).join();
				var second = all.slice(8).join();

				$("#inWords1").html(first.replace(/,/g , ' '));
				$("#inWords2").html(second.replace(/,/g , ' '));
				$("#inWords3").html("");
			}else{
				$("#inWords1").html(amouintwpord1);
				$("#inWords2").html("");
				$("#inWords3").html("");
			}
		}else if($(this).is(":not(:checked)")){
			var amouintwpord=$("#amount_word").val();
			var def_curnctname=$("#def_curnctname").val();
			var currencyType=$("#currencyType").val(def_curnctname);
			var amouintwpord1=amouintwpord.replace("Only",'');
			var newamount=amouintwpord1+' '+def_curnctname+' '+"Only";

			var words = $.trim(newamount).split(" ");
			var wordlen=words.length;
			if(wordlen==1){
				$("#inWords1").html("");
				$("#inWords2").html("");
				$("#inWords3").html("");
			}else if(wordlen>18){
				var all = newamount.split(" ");
				var first = all.slice(0,8).join();
				var second = all.slice(8,16).join();
				var three = all.slice(16).join();

				$("#inWords1").html(first.replace(/,/g , ' '));
				$("#inWords2").html(second.replace(/,/g , ' '));
				$("#inWords3").html(three.replace(/,/g , ' '));
			}else if( wordlen>10 && wordlen<=18 ){
				var all = newamount.split(" ");
				var first = all.slice(0,8).join();
				var second = all.slice(8).join();

				$("#inWords1").html(first.replace(/,/g , ' '));
				$("#inWords2").html(second.replace(/,/g , ' '));
				$("#inWords3").html("");
			}else{
				$("#inWords1").html(newamount);
				$("#inWords2").html("");
				$("#inWords3").html("");
			}
		}
	});
		$('#myText').on( 'change', function(){
			printpayname();
		} );
		$('#payment_for').on( 'change', function(){
			printpayname();
		} );
		$('#payment_type').on( 'change', function(){
			printpayname();
		} );
		$('#mydate').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
		$('#mydate').datepicker('setDate', 'today');

		// $('#mydate2').datepicker({
		// 	format: 'dd-mm-yyyy',
		// 	autoclose: true
		// });
		// $('#mydate2').datepicker('setDate', 'today');
		$("#dateCondition").on('change',function(){
			if($(this).val()=='select_date')
				$('#select_date_part').show();
			else
				$('#select_date_part').hide();
			temFunction();
		});
	$("#print_date_only").on('click',function(){
		var supplierid = $('#getSupplierDate').val();
		var chequeNo = $('#chequeNo').val();
		var purchase_id = $('#purchase_id').val();
		var payable_amount = $('#payable_amount').val();
		var unpaid = $('#payable_amount').val();
		var paid_to_supplier = $('#paid_to_supplier option:selected').val();
		var paid_amounts = $('#mynumber').val();
 
		if(chequeNo == ""){
            toastr.error("Check number is required.");
            return;
        }
        if (isNaN(chequeNo)){
            toastr.error("Check number is required.");
            return;
        }
		if(purchase_id=="")
		{
			alert("Please Select Order NO.");
			return;
		}
		if($('#mynumber').val()=="" || $('#mynumber').val()==0)
		{
			alert("Please Enter Amount.");
			return;
		}
		if(unpaid != 0 ){
			if(paid_to_supplier == ""){
				alert("Please Select Payment Status.");
				paid_to_supplier = 0;
				return;
			}
			
			if(parseFloat(unpaid.replace(/,/g, "")) < parseFloat(paid_amounts.replace(/,/g, ""))){
				alert("Paid To Supplier amount can't be greater than Unpaid.(" + parseFloat(unpaid.replace(/,/g, "")) + "<" + parseFloat(paid_amounts.replace(/,/g, "")) + ")");
				return;
			}
		}

			if(supplierid != ""){
				$.ajax({
					type:'POST',
					url:"<?php echo e(action('Chequer\ChequeWriteController@getChequeNoUniqueOrNotCheck'), false); ?>",
					data: {supplierid: supplierid, chequeNo : chequeNo},
					dataType: 'JSON',
					success:function(data){
						/* console.log(data); */
						if(data.cheque_check != null){
							alert("please Enter right Cheque No");
						}else{
							var template_id = $('#mySelect option:selected').val();
							var cheque_amount  = $('#mynumber').val();
							/* var payee = $('#myText option:selected').text(); */
							var payee = $('#myText').val();
							var cheque_no = $('#chequeNo').val();
							var cheque_date = $('#mydate').val();
							var payee_tempname=$("#payee_tempname").val();
							var stampvalu=$("#addStamps").val();
							var amount_word=$("#amount_word").val();
							var bankacount=$("#bankacount").val();
							var purchse_bill_no=$("#purchse_bill_no").val();
							var acoof=$("#acountof").val();
							$("#vou_date").html(cheque_date);

							$.ajax({
								url: "<?php echo e(url('cheque-write'), false); ?>",
								type    : 'POST',
								dataType: 'json',
								data: {purchse_bill_no:purchse_bill_no,print_status:'dateonly',payable_amount:payable_amount,purchase_id:purchase_id,paid_to_supplier:paid_to_supplier,template_id: template_id,cheque_amount: cheque_amount,payee: payee,cheque_no: cheque_no,cheque_date: cheque_date,payee_tempname:payee_tempname,stampvalu:stampvalu,amount_word:amount_word,bankacount:bankacount,acoof:acoof},
								error: function (jqXHR, exception) {
									console.log(jqXHR, exception);
								}
							}).done(function(data) {
								var dateHtml = $("#d1").parent().parent().wrap('<p/>').parent().html();
								var templateHtmlOld = $("div#template").html();
								$("div#template").html('');
								$("div#template").append(dateHtml);

								var divToPrint=document.getElementById('template').innerHTML;
								$("div#template").html(templateHtmlOld);
								var newWin=window.open('','Print-Window');
								newWin.document.open();
								newWin.document.write('<html><body onload="window.print()" style="margin-top:15px,margin-left:35px;">'+divToPrint+'</body></html>');
								newWin.document.close();
								location.reload();
							});
						}
					}
				});
			}else{
				alert("please Select Purchase Order");
			}
		});
		$('#paid_to_supplier').on('change',function(){
			if($(this).val()=='Full Payment' || $(this).val()=='Last Payment'){
				$('#mynumber').val($('#payable_amount').val());
				// $('#mynumber').prop('readonly',true);
			}
            else
				$('#mynumber').prop('readonly',false);

           
		});

		getBankNextChequedNO();
		$('#myText').select2();
		$('#purchase_id').select2();
		$('#paid_to_supplier').select2();
		// $('#payee_temlist').select2();
		$('#mySelect').select2();
		$('#bankacount').select2();
		$('#addStamps').select2();
		$('#currencyType').select2();
		$('#mynumber').focus();
			$('#paydive').num2words();

});

    //Dragable Script Start Here
    var dragging = false,
    currentDragged;
    var resizeHandles ='<div class="resize nw" id="nw" draggable="false" contenteditable="false"></div><div class="resize n" id="n" draggable="false" contenteditable="false"></div><div class="resize ne" id="ne" draggable="false" contenteditable="false"></div><div class="resize w" id="w" draggable="false" contenteditable="false"></div><div class="resize e" id="e" draggable="false" contenteditable="false"></div><div class="resize sw" id="sw" draggable="false" contenteditable="false"></div><div class="resize s" id="s" draggable="false" contenteditable="false"></div><div class="resize se" id="se" draggable="false" contenteditable="false"></div>';
    var resizing = false,
    currentResizeHandle,
    sX,
    sY;
    
    var mousedownEventType = ((document.ontouchstart!==null)?'mousedown':'touchstart'),
    mousemoveEventType = ((document.ontouchmove!==null)?'mousemove':'touchmove'),
    mouseupEventType = ((document.ontouchmove!==null)?'mouseup':'touchend');
    
    $('.draggable').on(mousedownEventType, function(e){
        if (!e.target.classList.contains("resize") && !resizing) {
            currentDragged = $(this);
            dragging = true;
            sX = e.pageX;
            sY = e.pageY;
        }
    });
    
    $(".resizable").focus(function(e){
        $(this).html($(this).html() + resizeHandles);
        $(".resize").on(mousedownEventType, function(e){
            currentResizeHandle = $(this);
            resizing = true;
            sX = e.pageX;
            sY = e.pageY;
        });
    }).blur(function(e){
        $(this).children(".resize").remove();
    });
    
    $("body").on(mousemoveEventType, function(e) {
        var xChange = e.pageX - sX,
        yChange = e.pageY - sY;
        if (resizing) {
            e.preventDefault();
            var parent  = currentResizeHandle.parent();
            switch (currentResizeHandle.attr('id')) {
                case "nw":
                    var newWidth = parseFloat(parent.css('width')) - xChange,
                    newHeight = parseFloat(parent.css('height')) - yChange,
                    newLeft = parseFloat(parent.css('margin-left')) + xChange,
                    newTop = parseFloat(parent.css('margin-top')) + yChange;
                break;
                case "n":
                    var newWidth = parseFloat(parent.css('width')),
                    newHeight = parseFloat(parent.css('height')) - yChange,
                    newLeft = parseFloat(parent.css('margin-left')),
                    newTop = parseFloat(parent.css('margin-top')) + yChange;
                break;
                case "ne":
                    var newWidth = parseFloat(parent.css('width')) + xChange,
                    newHeight = parseFloat(parent.css('height')) - yChange,
                    newLeft = parseFloat(parent.css('margin-left')),
                    newTop = parseFloat(parent.css('margin-top')) + yChange;
                break;
                case "e":
                    var newWidth = parseFloat(parent.css('width')) + xChange,
                    newHeight = parseFloat(parent.css('height')),
                    newLeft = parseFloat(parent.css('margin-left')),
                    newTop = parseFloat(parent.css('margin-top'));
                break;
                case "w":
                    var newWidth = parseFloat(parent.css('width')) - xChange,
                    newHeight = parseFloat(parent.css('height')),
                    newLeft = parseFloat(parent.css('margin-left')) + xChange,
                    newTop = parseFloat(parent.css('margin-top'));
                break;
                case "sw":
                    var newWidth = parseFloat(parent.css('width')) - xChange,
                    newHeight = parseFloat(parent.css('height')) + yChange,
                    newLeft = parseFloat(parent.css('margin-left')) + xChange,
                    newTop = parseFloat(parent.css('margin-top'));
                break;
                case "s":
                    var newWidth = parseFloat(parent.css('width')),
                    newHeight = parseFloat(parent.css('height')) + yChange,
                    newLeft = parseFloat(parent.css('margin-left')),
                    newTop = parseFloat(parent.css('margin-top'));
                break;
                case "se":
                    var newWidth = parseFloat(parent.css('width')) + xChange,
                    newHeight = parseFloat(parent.css('height')) + yChange,
                    newLeft = parseFloat(parent.css('margin-left')),
                    newTop = parseFloat(parent.css('margin-top'));
                break;
            }
    
            var containerWidth = parseFloat(parent.parent().css("width"));
            if (newLeft < 0) {
                newWidth += newLeft;
                newLeft = 0;
            }
    
            if (newWidth < 0) {
                newWidth = 0;
                newLeft = parent.css("margin-left");
            }
    
            if (newLeft + newWidth > containerWidth) {
                newWidth = containerWidth-newLeft;
            }
    
            parent.css('margin-left', newLeft + "px").css('width', newWidth + "px");
            sX = e.pageX;
    
            //Height
            var containerHeight = parseFloat(parent.parent().css("height"));
            if (newTop < 0) {
                newHeight += newTop;
                newTop = 0;
            }
            if (newHeight < 0) {
                newHeight = 0;
                newTop = parent.css("margin-top");
            }
            if (newTop + newHeight > containerHeight) {
                newHeight = containerHeight-newTop;
            }
    
            parent.css('margin-top', newTop + "px").css('height', newHeight + "px");
            sY = e.pageY;
        } else if (dragging) {
            e.preventDefault();
            var draggedWidth = parseFloat(currentDragged.css("width")),
            draggedHeight = parseFloat(currentDragged.css("height")),
            containerWidth = parseFloat(currentDragged.parent().css("width")),
            containerHeight = parseFloat(currentDragged.parent().css("height"));
    
            var newLeft = (parseFloat(currentDragged.css("margin-left")) + xChange),
            newTop = (parseFloat(currentDragged.css("margin-top")) + yChange);
    
            if (newLeft < 0) {
                newLeft = 0;
            }
            if (newTop < 0) {
                newTop = 0;
            }
            if (newLeft + draggedWidth > containerWidth) {
                newLeft = containerWidth - draggedWidth;
            }
            if (newTop + draggedHeight > containerHeight) {
                newTop = containerHeight - draggedHeight;
            }
    
            currentDragged.css("margin-left", newLeft + "px").css("margin-top", newTop + "px");
            sX = e.pageX;
            sY = e.pageY;
        }
    }).on(mouseupEventType, function(e){
        dragging = false;
        resizing = false;
    });

    function get_aligmentnego(){
        var d1top = $('#negotiable').css('margin-top');
        var d1left=  $('#negotiable').css('margin-left');
        var myString1 = (d1top.replace(/\D/g,'')*0.0104166667).toFixed(2);
        var myString2 = (d1left.replace(/\D/g,'')*0.0104166667).toFixed(2);
    }

    function get_aligmentpayonly(){
        var d1top = $('#payonly').css('margin-top');
        var d1left=  $('#payonly').css('margin-left');
        var myString1 = (d1top.replace(/\D/g,'')*0.0104166667).toFixed(2);
        var myString2 = (d1left.replace(/\D/g,'')*0.0104166667).toFixed(2);

        $("#negotiable").val(myString2);
        $("#negotiable").val(myString1);
        // $("#div_id").val('payonley'); 
    }
 function loadNextChequeNumber() {
    var bankAccountId = $('#bankacount').val();
    
    $('#bank-account-no').text('Bank Account No: ' + bankAccountId);

    if (bankAccountId) {
        $.ajax({
            url: '/get-next-cheque-number', // Adjust to match your route
            method: 'GET',
            data: {
                account_id: bankAccountId // Ensure the parameter name matches what the backend expects
            },
            success: function(response) {
                if (response.next_cheque_number) {
                    $('#chequeNo').val(response.next_cheque_number); // Populate the cheque number field
                } else {
                    $('#chequeNo').val('No available cheque number'); // Handle case where no cheque number is available
                }
            },
            error: function(xhr) {
                // Optional: You can log the actual error response for debugging
                console.error(xhr.responseText);
                // Optionally show a more user-friendly message
                $('#chequeNo').val('No available cheque number'); // Prevent showing the error loading message
            }
        });
    } else {
        $('#chequeNo').val(''); // Reset the cheque number field if no bank account is selected
    }
}

    function validateDecimalInput(input) {
        input.value = input.value.replace(/[^0-9.]/g, '');
        if ((input.value.match(/\./g) || []).length > 1) {
            input.value = input.value.slice(0, -1);
        }
    }


    function addStatusToTemplate(input) {
        if(input.value.includes('partial')) {
            // $('#payment-status').text('Payment Status: Partial Payment');
        }
    }
    function toggleShowInAccount() {
        const postDateCheckbox = document.getElementById('postDate');
        const showInAccountCheckbox = document.getElementById('showInAccount');

        // Enable or disable the "Show In Account" checkbox based on the "Post Date Cheque" checkbox
        showInAccountCheckbox.disabled = !postDateCheckbox.checked;
        if (!postDateCheckbox.checked) {
            showInAccountCheckbox.checked = false; // Uncheck if disabled
        }
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/resources/views/chequer/write_cheque/create.blade.php ENDPATH**/ ?>