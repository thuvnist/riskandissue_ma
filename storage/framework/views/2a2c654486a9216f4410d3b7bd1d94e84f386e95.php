<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <form action="" class="form-horizontal">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="text-left">
                            <button class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                Thêm mới dữ liệu
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="d-flex mb-20">
                                <i class="fa fa-search i-search"></i>
                                <input class="w-50 form-control" type="text" name="search" id="search" placeholder="Tìm kiếm">
                            </div>

                            <div class="form-group">
                                <a href="#">Databases</a>
                            </div>
                            <div class="db-area">
                                <div class="form-group">Database 1
                                    <i class="fa fa-database"></i>
                                    <i class="fa fa-minus-circle minus"></i>
                                </div>
                                <div class="form-group">Database 2
                                    <i class="fa fa-database"></i>
                                    <i class="fa fa-minus-circle minus"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="#">Excel files</a>
                            </div>
                            <div class="db-area">
                                <div class="form-group">Danh sách KPI
                                    <i class="fa fa-file-excel-o"></i>
                                    <i class="fa fa-minus-circle minus"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="#">CSV files</a>
                            </div>
                            <div class="db-area">
                                <div class="form-group">Danh sách nhân viên
                                    <i class="fa fa-file-text"></i>
                                    <i class="fa fa-minus-circle minus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/reports/connect_management.blade.php ENDPATH**/ ?>