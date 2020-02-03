<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row im-task-header-child">
            <div class="form-horizontal">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="label-control" for=""></label>
                                <input style="margin-top: 5px;" class="form-control input-save-inline" value="<?php echo e($risk['title']); ?>" type="text">
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Mức ưu tiên</label>
                                <select class="form-control priority-select-save-inline" data-href="" name="priority" id="">
                                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($risk['priority'] == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($priority); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Trạng thái</label>
                                <select class="form-control status-select-save-inline" name="status" id="">
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($risk['status'] == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <p>Phòng ngừa bởi
                                    <b>
                                        <?php echo e(\App\User::getNameFromId($risk['created_by'])); ?>

                                    </b>, quan sát bởi
                                    <b>
                                        <?php echo e(\App\User::getNameFromId($risk['inspect_user'])); ?>

                                    </b>, phê duyệt bởi
                                    <b>
                                        <?php echo e(\App\User::getNameFromId($risk['approved_user'])); ?>

                                    </b>, phát hiện bởi
                                    <b>
                                        <?php if($risk['detected_user'] == 0): ?>
                                            <?php echo e(\App\User::DETECTED_USER[0]); ?>

                                        <?php else: ?>
                                            <?php echo e(\App\User::getNameFromId($risk['detected_user'])); ?>

                                        <?php endif; ?>
                                    </b>
                                </p>
                                <p>Thuộc quy trình <span data-toggle="modal" data-target="#modalChart" class="text-primary cursor-pointer">phòng ngừa rùi ro</span> (7 bước, bạn đang ở bước 3)</p>
                                <p>vui lòng click vào chiến lược phòng ngừa để chuyển sang bước kế hoạch phản hồi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box box-info issue">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Mô tả: <?php echo e($risk['desc']); ?>

                        </div>
                        <div class="col-lg-6">
                            Thời gian tạo: <?php if(isset($risk['created_at']['date'])): ?><?php echo e(date_format(date_create($risk['created_at']['date']), 'Y-m-d')); ?> <?php else: ?> <?php echo e(date_format(date_create($risk['created_at']), 'Y-m-d')); ?> <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Hạn phòng ngừa: <?php echo e($risk['deadline']); ?>

                        </div>
                    </div>

                    <div class="row mt-10">
                        <div class="col-lg-6">
                            Mức độ nghiêm trọng: <?php echo e(\App\Issue::getLabelRiskDanger($risk['danger'])); ?>

                        </div>
                        <div class="col-lg-6">
                            Xu hướng xảy ra: <?php echo e(\App\Issue::getLabelRiskDanger($risk['feature'])); ?>

                        </div>
                    </div>

                    <div class="mt-10">
                        <h3>Kết thúc phòng ngừa risk</h3>
                        <button type="button" class="btn btn-primary">Yêu cầu phê duyệt kết thúc phòng ngừa risk</button>
                    </div>

                    <ul class="nav nav-pills mt-20">
                        <li class="active"><a data-toggle="pill" href="#menu3">Hoạt động</a></li>
                        <li><a data-toggle="pill" href="#menu4">Trao đổi</a></li>
                        <li><a data-toggle="pill" href="#menu5">Tài liệu</a></li>
                        <li><a data-toggle="pill" href="#menu6">Chiến lược phòng ngừa</a></li>
                        <li><a data-toggle="pill" href="#menu7">Vấn đề phát sinh</a></li>
                    </ul>

                    <div class="tab-content mt-10">
                        <div id="menu3" class="tab-pane fade in active mb-20">
                            <h3>Hoạt động</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <h3>Trao đổi</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <h3>Tài liệu</h3>
                            <div class="box-body">

                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <h3>Chiến lược phòng ngừa</h3>
                            <div class="box-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Loại chiến lược phòng ngừa</th>
                                        <th>Trạng thái kế hoạch hành động</th>
                                        <th>Mức ưu tiên</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($risk['defend'])): ?>
                                        <?php $__currentLoopData = $risk['defend']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e(\App\Task::GIAIQUYET[$value['type']]); ?></td>
                                                <td><?php if(isset($value['schedule_status'])): ?><?php echo e(\App\Issue::DEFEND_SCHEDULE_STATUS[$value['schedule_status']]); ?> <?php endif; ?></td>
                                                <td><?php echo e(\App\Issue::DEFEND_PRIORITY[$value['priority']]); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <button data-risk="<?php echo e($key); ?>" data-task="<?php echo e($task->id); ?>" data-href="<?php echo e(route('tasks.risks.defend')); ?>" class="btn btn-primary js-btn-risk-defend mt-20 mb-20">Thêm chiến lược phòng ngừa</button>
                            </div>
                        </div>
                        <div id="menu7" class="tab-pane fade">
                            <h3>Vấn đề phát sinh</h3>
                            <div class="box-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalChart" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3>Quy trình phòng ngừa rủi ro<button type="button" class="close" data-dismiss="modal">&times;</button></h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div style="width: 850px; height: 700px; margin: auto; background-color: #ecf0f5;" class="position-relative">
                        <div class="box-circleci box-1 box-bg-1">
                            Start
                        </div>
                        <div class="box-square box-2 box-bg-1">
                            1. Xác định, rủi ro
                        </div>
                        <div class="box-square box-3 box-bg-1">
                            2. Phân tích và đặt mức ưu tiên rủi ro
                        </div>
                        <div class="box-square box-4 box-bg-2">
                            3. Lên kế hoạch phản hồi
                        </div>
                        <div class="box-square box-5">
                            4. Thực thi, theo dõi và kiểm soát
                        </div>
                        <div class="box-square box-6">
                            5. Phê duyệt rủi ro
                        </div>
                        <div class="box-square box-7">
                            6. Đóng rủi ro
                        </div>
                        <div class="box-rotate box-8">
                        </div>
                        <div class="box-square box-9">
                            7. Scale thành vấn đề phát sinh
                        </div>
                        <div class="box-circleci box-10">
                            Stop
                        </div>
                        <div class="line-temp-1 line-1">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-2 line-2">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-3">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-4">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-2 line-5">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-temp-1 line-6">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-1 line-7">
                            rủi ro xảy ra
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-1 line-8">
                            <i class="fa fa-angle-right"></i>
                        </div>
                        <div class="line-temp-2 line-9">
                            <i class="fa fa-angle-down"></i>
                        </div>
                        <div class="line-10">
                            <i class="fa fa-angle-left"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModalShow" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('click', '.js-btn-risk-defend', function() {
            let url = $(this).data('href');
            let data = {
                'task_id' : $(this).data('task'),
                'risk' : $(this).data('risk')
            };
            $.ajax({
                type: 'post',
                url,
                data: data,
                success(data) {
                    let $modal = $('#myModalShow');
                    $modal.find('.modal-body').html('').append(data);
                    $modal.modal('show');
                },
            });
        });
        CKEDITOR.replace( 'editor1' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/risks/detail.blade.php ENDPATH**/ ?>