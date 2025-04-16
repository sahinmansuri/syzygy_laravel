<input id="<?php echo e($input_phone_name, false); ?>" type="tel" name=""  class="form-control-lg w-100" >
<input id="<?php echo e($input_phone_name, false); ?>_code" type="hidden" name="<?php echo e($input_phone_name, false); ?>[code]"  class="form-control-lg w-100" <?php if(isset($input_phone)): ?>
value="<?php echo e($input_phone['code'] ?? '', false); ?>"    
<?php else: ?>
value=""
<?php endif; ?>/>
<input id="<?php echo e($input_phone_name, false); ?>_phone" type="hidden" name="<?php echo e($input_phone_name, false); ?>[number]"  class="form-control-lg w-100" <?php if(isset($input_phone)): ?>
value="<?php echo e($input_phone['number'] ?? '', false); ?>"    
<?php else: ?>
value=""
<?php endif; ?>/>
<script>
    var phoneInputField =  document.querySelector('#<?php echo e($input_phone_name, false); ?>');
    var phoneCode = document.querySelector('#<?php echo e($input_phone_name, false); ?>_code');
    var phoneNumberInput = document.querySelector('#<?php echo e($input_phone_name, false); ?>_phone');
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["lk","pk",'ir','iq'],
        utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    <?php if(isset($input_phone)): ?>
    phoneInput.setNumber("+<?php echo e($input_phone['code'] ?? '', false); ?><?php echo e($input_phone['number'] ?? '', false); ?>");
    //cleanPhoneNumber();
    <?php endif; ?>
    phoneInputField.addEventListener("countrychange", function() {
        cleanPhoneNumber();

});
phoneInputField.addEventListener("keyup",function(){
    cleanPhoneNumber();
});

function cleanPhoneNumber(){
    var phone_setting = phoneInput.getSelectedCountryData();
    phoneCode.value = phone_setting.dialCode;
    phoneNumberInput.value = phoneInput.getNumber().replace('+'+phoneCode.value,'');
   // phoneInput.setNumber(phoneNumberInput.value);
}
</script><?php /**PATH /home/vimi31/public_html/resources/views/components/phone_feild_component.blade.php ENDPATH**/ ?>