<?php $__env->startSection('title'); ?>
    Button Issue
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_tasks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box box-header" style="margin-bottom: 0;">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" autofocus placeholder="Công việc"
                               value="Công việc 1" style="height: 60px">
                    </div>
                    <div class="col-sm-3">
                        <label>
                            Mức ưu tiên
                        </label>
                        <select class="form-control">
                            <option selected disable value="">-- Chọn mức ưu tiên --</option>
                            <option value="">Thấp</option>
                            <option value="">Trung bình</option>
                            <option value="">Cao</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>
                            Trạng thái
                        </label>
                        <select class="form-control">
                            <option selected disabled value="">-- Chọn trạng thái --</option>
                            <option value="">Mới</option>
                            <option value="">Đang thực hiện</option>
                            <option value="">Đóng</option>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <p>Thực hiện bởi <a class="bg-aqua" href="#">Tôi</a>, quan sát bởi <a class="bg-aqua" href="#">Trần
                            Hải Nam</a>, phê duyệt bởi
                        <a class="bg-aqua" href="#">Lý Minh Hà</a>, tạo/giao bởi <a class="bg-aqua" href="#">Lý Minh
                            Hà</a></p>
                </div>
                <div class="box-body">
                    <form method="">
                        <h4 for="description">Mô tả <i class="fa fa-pencil"></i></h4>
                        <textarea class="form-control" rows="7" placeholder="Mô tả công việc." name="description">
                            Đây là công việc cần thực hiện gấp
                            Các kết quả cần đạt:
                            1. Nộp tài liệu tham khảo tìm được trước 15/07
                            2. Nộp báo cáo trước ngày 20/07
                            3. Nộp hồ sơ trước ngày 29/07.
                        </textarea>
                        <h4 class="">Thông tin công việc <i class="fa fa-info-circle"
                                                            aria-hidden="true"></i></h4>
                        <div class="col-sm-6">
                            <label for="percentage">% hoàn thành</label>
                            <input type="text" class="form-control" placeholder="%" name="percentage">

                            <label for="point">Người thực hiện tự đánh giá</label>
                            <input type="text" class="form-control" placeholder="điểm" name="point">

                            <label for="firstInfo">Thông tin 1</label>
                            <input type="text" class="form-control" placeholder="Thông tin 1" name="firstInfo">

                            <label for="secondInfo">Thông tin 2</label>
                            <input type="text" class="form-control" placeholder="Thông tin 2" name="secondInfo">

                            <label for="thirdInfo">Thông tin 3</label>
                            <input type="text" class="form-control" placeholder="Thông tin 3" name="thirdInfo">

                            <label for="fourthInfo">Thông tin 4</label>
                            <input type="text" class="form-control" placeholder="Thông tin 4" name="fourthInfo">

                            <div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="startDate">Ngày bắt đầu</label>
                            <input type="date" name="startDate" class="form-control">
                            <label for="endDate">Ngày kết thúc</label>
                            <input type="date" name="endDate" class="form-control">
                            <div class="form-group">
                                <label for="workTime">Số giờ làm việc</label>
                                <input type="text" class="form-control" disabled value="15"
                                       name="workTime"><span> giờ</span>
                            </div>
                            <div class="form-group">
                                <label for="overdueDate">Trễ hạn</label>
                                <input type="text" class="form-control" disabled value="2"><span> ngày</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <h4>Kết thúc công việc <i class="fa fa-check-square-o" aria-hidden="true"></i></h4>
                    <a class="btn btn-primary">Yêu cầu phê duyệt kết thúc công việc</a>
                </div>
                <div class="box-body">
                    <ul class="nav navbar-nav navbar-btn nav-child">
                        <li class="nav-active"><a href="#">Hoạt động (2)</a></li>
                        <li class="nav-active"><a href="#">Trao đổi (15)</a></li>
                        <li class="nav-active"><a href="#">Tài liệu</a></li>
                        <li class="nav-active"><a href="#">Issue</a></li>
                    </ul>
                </div>
                <div class="box-body">
                    <label>Associated issue</label>
                    <div class="">
                        <div class="col-sm-4">
                            <p>Issue#9735</p>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control bg-orange">
                                <option>Đang thực hiện</option>
                                <option>Mới</option>
                                <option>Đóng</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <p>Tiêu đề issue 1</p>
                            <p>thunt153710</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-primary">Associated issues</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/issues/button.blade.php ENDPATH**/ ?>