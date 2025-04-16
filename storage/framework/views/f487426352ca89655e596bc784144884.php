
<?php $__env->startSection('title', __('mpcs::lang.form_9_ccr_settings')); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<section class="content">

   <div class="row">
        <div class="col-md-12">
            <div class="settlement_tabs">
                <ul class="nav nav-tabs">
                    <?php if(auth()->user()->can('f9a_form')): ?>
                    <li class="active">
                        <a href="#9a_form_tab" class="9a_form_tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong><?php echo app('translator')->get('mpcs::lang.form_9_c'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->can(abilities: 'f9a_settings_form')): ?>
                    <li class="">
                        <a href="#9a_form_settings_tab" class="9a_form_settings_tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> <strong><?php echo app('translator')->get('mpcs::lang.form_9_ccr_settings'); ?></strong>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <?php if(auth()->user()->can('f9a_form')): ?>
                    <div class="tab-pane active" id="9a_form_tab">
                        <?php echo $__env->make('mpcs::forms.partials.9ccr_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>
                    <?php if(auth()->user()->can('f9a_settings_form')): ?>
                    <div class="tab-pane" id="9a_form_settings_tab">
                        <?php echo $__env->make('mpcs::forms.partials.9ccr_settings_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade form_9_ccr_settings_modal" id="form_9_ccr_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
    <div class="modal fade update_form_9_ccr_settings_modal" id="update_form_9_ccr_settings_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script>
    new Vue({
        el: '#app',
        data() {
            return {
                title: 'F14B Former',
                business_locations: <?php echo json_encode($business_locations); ?>,
                setting: <?php echo json_encode($setting); ?>,
                business: <?php echo json_encode($business); ?>,
                filter: {business_location_id:"<?php echo e($default_business_location, false); ?>",date_range:'',form_no:<?php echo e(optional($setting)['F14_form_sn'], false); ?>},
                fuel_qty_decimals: <?php echo e($fuel_qty_decimals ?? '', false); ?>,
                credit_sales: [],
                sales:[],
                page:1,
                pages:[]
            }
        },
        mounted() {
            $(document).ready(() => {
                

                $(this.$refs.daterange).daterangepicker(dateRangeSettings, (start, end) => {
                  this.filter.date_range = `${start.format('YYYY-MM-DD')} to ${end.format('YYYY-MM-DD')}`;
                  this.getData();
                });
                
                this.filter.date_range = '<?php echo e($startdate ?? '', false); ?> to <?php echo e($enddate ?? '', false); ?>';
                this.getData();
            });
        },
        methods: {
            setBusinessLocation( a,b ){
                console.log(this.filter.business_location_id);
                
                this.getData();
            },
            prevPage(){
              if(this.page > 0){
                  this.setPage(this.page - 1);
              }  
            },
            nextPage(){
              if(this.page < (this.pages.length - 1)){
                  this.setPage(this.page + 1);
              }  
            },
            setPage(page){
                this.page = page;
                this.sales = this.credit_sales[this.pages[this.page]];
            },
            getData(){
                
                console.log('get data by axios get');
                console.log(this.filter.business_location_id);
                console.log(this.filter.date_range);
                console.log(this.filter.form_no);
                
                axios.get('/mpcs/mpcs/get-form-14',{params:this.filter}).then(res => {
                    if(res.status == 200){
                        
                        this.credit_sales = res.data;
                        this.pages = Object.keys(res.data);
                        
                        this.setPage(0);
                        
                    }
                }).catch(err => {
                    console.log(err);
                });
                
            }
        }
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        
           form_9ccr_table = $('#form_9ccr_table').DataTable({
            processing: true,
            serverSide: true,
            paging: false, 
            ajax: {
                "type": "get",
                "url": "/mpcs/get-form-9ccr-settings",
            },
            columns: [
                        { data: 'action', name: 'action', searchable: false, orderable: false },
                        { data: 'form_9a_no', name: 'form_9a_no' },
                        { data: 'form_9a_no', name: 'form_9a_no' },
                        { data: 'form_9a_no', name: 'ref_pre_fform_9a_noorm_number'},
                        { data: 'form_9a_no', name: 'form_9a_no'},
             
               
            ]
        });

      

        //form 9a list
        form_9a_settings_table = $('#form_9a_settings_table').DataTable({
            processing: true,
            serverSide: true,
            paging: false, 
            ajax: {
                "type": "get",
                "url": "/mpcs/get-form-9ccr-settings",
            },
            columns: [
                        { data: 'action', name: 'action', searchable: false, orderable: false },
                        { data: 'date_time', name: 'date_time' },
                        { data: 'starting_number', name: 'starting_number' },
                        { data: 'ref_pre_form_number', name: 'ref_pre_form_number'},
                        { data: 'added_user', name: 'added_user'},
             
               
            ]
        });

        //form 9a section
        $(document).on('submit', 'form#add_9a_form_settings', function(e) {
        
            e.preventDefault();
            $(this).find('button[type="submit"]').attr('disabled', true);
            var data = $(this).serialize();
            
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        
                        toastr.success(result.msg);
                        form_9a_settings_table.ajax.reload();
                        $('div#form_9_a_settings_modal').modal('hide');
                        
                        if ($('#form_9a_settings_table').length > 0) {
                            $(this).find('button[type="submit"]').attr('disabled', false);
                        }
                        
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });

        //update form 9a section
        $(document).on('submit', 'form#update_9a_form_settings', function(e) {

            e.preventDefault();
            $(this).find('button[type="submit"]').attr('disabled', true);
            var data = $(this).serialize();
            
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                dataType: 'json',
                data: data,
                success: function(result) {
                    if (result.success == true) {
                        
                        toastr.success(result.msg);
                        form_9a_settings_table.ajax.reload();
                        $('div#update_form_9_a_settings_modal').modal('hide');
                        
                        if ($('#form_9a_settings_table').length > 0) {
                            $(this).find('button[type="submit"]').attr('disabled', false);
                        }
                        
                    } else {
                        toastr.error(result.msg);
                    }
                },
            });
        });
        
        $("#print_div").click(function(){
            printDiv();
        });

        function printDiv() {
            var w = window.open('', '_self');
            var html = `
                <html>
                    <head>
                        <style>
                            @page {
                                size: landscape;
                            }
                            body {
                                width: 100%;
                                margin: 0;
                                padding: 0;
                            }
                            @media print {
                                html, body {
                                    width: 100%;
                                    overflow: visible !important;
                                }
                                * {
                                    font-size: 8pt;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${document.getElementById("print_content").innerHTML}
                    </body>
                </html>
            `;
            $(w.document.body).html(html);
            w.print();
            w.close();
            window.location.href = "<?php echo e(URL::to('/'), false); ?>/mpcs/form-9c";
        }
 function printDivs() {
            var w = window.open('', '_self');
            var html = `
                <html>
                    <head>
                        <style>
                            @page {
                                size: landscape;
                            }
                            body {
                                width: 100%;
                                margin: 0;
                                padding: 0;
                            }
                            @media print {
                                html, body {
                                    width: 100%;
                                    overflow: visible !important;
                                }
                                * {
                                    font-size: 8pt;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${document.getElementById("print_content").innerHTML}
                    </body>
                </html>
            `;
            $(w.document.body).html(html);
            w.print();
            w.close();
            window.location.href = "<?php echo e(URL::to('/'), false); ?>/mpcs/form-9ccr";
        }
    });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vimi31/public_html/Modules/MPCS/Providers/../Resources/views/forms/form_9ccr.blade.php ENDPATH**/ ?>