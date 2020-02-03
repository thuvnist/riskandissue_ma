<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                    <div class="box-header">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="input-group im-search">
                                <div class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-4 im-flex im-flex-center">
                            <div class="im-box im-flex im-flex-column im-flex-center">
                                <div>
                                    <i class="fa fa-folder-open fa-10x"></i>
                                </div>
                                <div class="text-center">
                                    <h4>Tạo kho mới:</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 im-flex im-flex-center">
                            <div class="im-box im-flex im-flex-column">
                                <div class="im-flex">
                                    <div style="width: 80%; border: 1px #000000 solid; background: blue; margin-top: 5px;">
                                        <h4 style="color: white">
                                            Kho 1
                                        </h4>
                                    </div>
                                    <div style="width: 20%; font-size: 20px;" class="im-flex im-flex-center">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                <h4 class="text-center">Số lượng: 2</h4>
                                <h4 class="text-center">Số lượng: 2</h4>
                            </div>
                        </div>
                        <div class="col-md-4 im-flex im-flex-center">
                            <div class="im-box im-flex im-flex-column">
                                <div class="im-flex">
                                    <div style="width: 80%; border: 1px #000000 solid; background: blue; margin-top: 5px;">
                                        <h4 style="color: white">
                                            Kho 1
                                        </h4>
                                    </div>
                                    <div style="width: 20%; font-size: 20px;" class="im-flex im-flex-center">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                <h4 class="text-center">Số lượng: 2</h4>
                                <h4 class="text-center">Số lượng: 2</h4>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/reports/storage.blade.php ENDPATH**/ ?>