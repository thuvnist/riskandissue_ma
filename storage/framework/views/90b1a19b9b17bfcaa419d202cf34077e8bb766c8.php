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
                            <div class="option-db">
                                <a href="#">
                                    <i class="fa fa-undo undo" aria-hidden="true"></i>
                                </a>
                                <p>Back</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <hr>
                            <div class="d-flex mb-20">
                                <i class="fa fa-search i-search"></i>
                                <input class="w-50 form-control" type="text" name="search" id="search" placeholder="Tìm kiếm">
                            </div>
                            <hr>
                            <div class="input-db d-flex ml-20">
                                <input type="hidden" name="sql">
                                <input type="hidden" name="excel">
                                <input type="hidden" name="csv">
                                <div class="custom-div mr-30 ">
                                    <p><i class="fa fa-database"></i></p>
                                    <p>Database</p>
                                </div>
                                <div class="custom-div mr-30">
                                    <p><i class="fa fa-file-excel-o"></i></p>
                                    <p>Database</p>
                                </div>
                                <div class="custom-div">
                                    <p><i class="fa fa-minus-circle"></i></p>
                                    <p>Database</p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/reports/option.blade.php ENDPATH**/ ?>