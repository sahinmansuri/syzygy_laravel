<?php $__env->startSection('css'); ?>
<style>
    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .inline {
        display: inline;
    }
    .dataTable{
        width:100% !important;
    }
</style>
<?php $__env->stopSection(); ?>
<div class="pos-tab-content">
    <div class="container-xl">
        <!-- Page title -->
        <div class="mb-3">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="page-title">
                        <?php echo e(__('By Products'), false); ?>

                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-lg-6  mt-10">
                    <button type="button" onclick="addByProducts()" class="btn btn-primary pull-right mt-10" aria-label="Left Align">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <?php echo e(__('Add By Products'), false); ?>

                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive px-2 py-2">
                            <table class="table table-bordered table-striped" id="by_products_table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Date'), false); ?></th>
                                        <th><?php echo e(__('Name'), false); ?></th>
                                        <th><?php echo e(__('User'), false); ?></th>
                                        <th class="w-1"><?php echo e(__('Actions'), false); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade " id="add-byproducts-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content main-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">By Products</h4>
                </div>
                <form id="mfg_by_products_form" action="javascript:saveByProducts();" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <?php echo Form::label('by_products_name', __( 'By Products Name' ) . ':*'); ?>

                                <?php echo Form::text('by_products_name', '', ['id'=>'by_products_name','class' => 'form-control', 'required', 'placeholder' => __(
                                'By Product Name' )]); ?>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" onclick="submitByProducts()" class="btn btn-primary"><?php echo app('translator')->get( 'messages.save' ); ?></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        var by_products_table;
        $(document).ready(function() {

            buildByProductsTable();

        });

        function submitByProducts() {
            if ($('#by_products_name').valid()) {
                saveByProducts();
            }
        }

        function addByProducts(parameter) {
            "use strict";
            $("#add-byproducts-modal").modal("show");
        }

        function buildByProductsTable() {
            by_products_table = $('#by_products_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            ajax: {
                url: "<?php echo e(action('\Modules\Manufacturing\Http\Controllers\SettingsController@getByProducts'), false); ?>",
            },
            columns: [
                { data: 'date', name: 'date' },
                { data: 'name', name: 'name' },
                { data: 'user', name: 'user' },
                { data: 'action', searchable: false, orderable: false },
                
            ],
            fnDrawCallback: function(oSettings) {
            
            },
        });
        }

        function saveByProducts() {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route("saveByProducts"), false); ?>',
                data: {
                    by_products_name: $('#by_products_name').val()
                },

                success: function(response) {
                    console.log(response);
                    if (response.success == 1) {
                        swal({
                            text: response.msg,
                            icon: "success",
                        });

                        $("#add-byproducts-modal").modal("hide");
                        $('#by_products_name').val('');
                        by_products_table.ajax.reload();
                    } else {
                        swal({
                            text: response.msg,
                            icon: "error",
                        });
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

            return false;
        }

        function disableByProductsItem(id){
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route("disableItem"), false); ?>',
                data: {
                    id: id
                },

                success: function(response) {
                    console.log(response);
                    if (response.success == 1) {
                        swal({
                            text: response.msg,
                            icon: "success",
                        });
                        by_products_table.ajax.reload();
                    } else {
                        swal({
                            text: response.msg,
                            icon: "error",
                        });
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

            return false;
        }


        function enableByProductsItem(id){
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route("enableItem"), false); ?>',
                data: {
                    id: id
                },

                success: function(response) {
                    console.log(response);
                    if (response.success == 1) {
                        swal({
                            text: response.msg,
                            icon: "success",
                        });
                        by_products_table.ajax.reload();
                    } else {
                        swal({
                            text: response.msg,
                            icon: "error",
                        });
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

            return false;
        }
    </script>

</div><?php /**PATH /home/vimi31/public_html/Modules/Manufacturing/Providers/../Resources/views/settings/partials/by_products.blade.php ENDPATH**/ ?>