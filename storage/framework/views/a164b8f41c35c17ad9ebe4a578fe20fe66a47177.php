    <?php $__env->startSection('nav'); ?>
        <?php echo $__env->make('layouts.nav_report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <div class="border col-lg-2 table-database">
                        <div class="bg-board-2">Database 1</div>
                        <input type="text" class="form-control mt-10" placeholder="tìm kiếm..">
                        <div class="border mt-10">
                            Table 1
                        </div>
                        <div>
                            <div>
                                <p># Name</p>
                                <p># Age</p>
                                <p># Sex</p>
                            </div>
                        </div>
                        <div class="border mt-10">
                            Table 2
                        </div>
                        <div>
                            <div>
                                <p># Weight</p>
                                <p># Height</p>
                                <p># Degree</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="row border-bottom pb-10">
                            <div class="col-lg-6">
                                <img class="img-icon mr-10" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/bar_chart-128.png">
                                <img class="img-icon mr-10" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/line_chart-128.png">
                            </div>
                            <div class="col-lg-6 text-right">
                                <img class="img-icon mr-10" src="https://cdn3.iconfinder.com/data/icons/streamline-icon-set-free-pack/48/Streamline-70-128.png">
                                <img class="img-icon mr-10" src="https://cdn2.iconfinder.com/data/icons/cute-tech-icon-set-1/512/Upload-128.png">
                                <img class="img-icon mr-10" src="https://cdn0.iconfinder.com/data/icons/network-communication-6/132/Untitled-3-31-128.png">
                                <img class="img-icon mr-10" src="https://cdn1.iconfinder.com/data/icons/feather-2/24/save-128.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/reports/analysis.blade.php ENDPATH**/ ?>