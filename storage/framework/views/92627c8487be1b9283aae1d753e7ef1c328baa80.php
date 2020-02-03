<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_tasks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="border-round"><i class="fa fa-sort-down"></i><span>Lọc</span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            Trạng thái
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Đang thực hiện</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            Mức ưu tiên
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Is</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>High</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-lg-6 custom-input-check">
                                        <label class="custom-input-check control-label">
                                            Thêm lọc
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control">
                                            <option>Loại issue</option>
                                            <option>Trạng thái</option>
                                            <option>Người thực hiện</option>
                                            <option>Mức ưu tiên</option>
                                            <option>% Đã làm</option>
                                            <option>Bắt đầu</option>
                                            <option>Kết thúc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-10">
                                <button class="btn btn-primary mr-20">Apply<i class="fa fa-check ml-5"></i></button>
                                <button class="btn btn-primary">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box box-default">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Tên issue</th>
                                <th>Loại issue</th>
                                <th>Trạng thái</th>
                                <th>Người thực hiện</th>
                                <th>Ưu tiên</th>
                                <th>% Đã làm</th>
                                <th>Bắt đầu</th>
                                <th>Kết thúc</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>issue 1</td>
                                <td>technical</td>
                                <td>Đang thực hiện</td>
                                <td></td>
                                <td>Cao</td>
                                <td></td>
                                <td>1/5/2019</td>
                                <td>31/5/2019</td>
                                <td>20 tiếng</td>
                            </tr>
                            <tr>
                                <td>issue 2</td>
                                <td>technical</td>
                                <td>Đang thực hiện</td>
                                <td></td>
                                <td>Cao</td>
                                <td></td>
                                <td>1/5/2019</td>
                                <td>31/5/2019</td>
                                <td>20 tiếng</td>
                            </tr>
                            <tr>
                                <td>issue 3</td>
                                <td>technical</td>
                                <td>Đang thực hiện</td>
                                <td></td>
                                <td>Cao</td>
                                <td></td>
                                <td>1/5/2019</td>
                                <td>31/5/2019</td>
                                <td>20 tiếng</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/tasks/index.blade.php ENDPATH**/ ?>