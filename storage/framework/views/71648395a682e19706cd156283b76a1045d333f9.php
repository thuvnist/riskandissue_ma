<?php $__env->startSection('content'); ?>

    <div class="container-fluid issue">
        <div class="row im-task-header-child">
            <div class="form-horizontal">
                <div class="box box-info mt-20">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="label-control" for=""></label>
                                <input style="margin-top: 5px;" class="form-control input-save-inline" data-href="<?php echo e(route('tasks.save_inline', $issue->id)); ?>" value="<?php echo e($issue->title); ?>" type="text">
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Mức ưu tiên</label>
                                <select class="form-control priority-select-save-inline" data-href="<?php echo e(route('tasks.save_inline', $issue->id)); ?>" name="priority" id="">
                                    <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($issue->priority == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($priority); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="label-control" for="">Trạng thái</label>
                                <?php if($issue->status == 4): ?>
                                    <div>
                                        <?php echo e($statuses[4]); ?>

                                    </div>
                                <?php elseif($issue->status == 3): ?>
                                    <div>
                                        <?php echo e($statuses[3]); ?>

                                    </div>
                                <?php else: ?>
                                    <?php unset($statuses[3]);
                                    unset($statuses[4]); ?>
                                    <select class="form-control status-select-save-inline" data-href="<?php echo e(route('tasks.save_inline', $issue->id)); ?>" name="status" id="">
                                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($issue->status == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <p>Giải quyết bời
                                    <b>
                                        tôi
                                    </b>, quan sát bởi
                                    <b>
                                        Trần Hải Nam
                                    </b>, phê duyệt bởi
                                    <b>
                                        Lý Minh Hà
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-info mt-20">
                    <div class="box-body">
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Trạng thái: <?php echo e($issue->getStatusNameAttribute()); ?>

                            </div>
                            <div class="col-lg-6">
                                Ngày bắt đầu: <?php echo e($issue->start_date); ?>

                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Ưu tiên: <?php echo e($issue->getPriorityNameAttribute()); ?>

                            </div>
                            <div class="col-lg-6">
                                Ngày kết thúc: <?php echo e($issue->end_date); ?>

                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Assigne: <?php echo e($issue->user_id ? $issue->user->name : ''); ?>

                            </div>
                            <div class="col-lg-6">
                                % Đã làm: <?php echo e($issue->getLabelPercent()); ?>

                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Loại: <?php echo e($issue->type_label); ?>

                            </div>
                            <div class="col-lg-6">
                                Thời gian: <?php echo e($issue->time ? $issue->time . ' giờ' : ''); ?>

                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-6">
                                Mô tả: <?php echo e($issue->description); ?>

                            </div>
                            <div class="col-lg-6">
                                Issue con:
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-12">
                                <h3>Kết thúc giải quyết issue</h3>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary">Yêu cầu phê duyệt kết thúc issue</button>
                            </div>
                        </div>

                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#menu3">Công việc liên quan</a></li>
                            <li><a data-toggle="pill" href="#menu5">Liên kết issue</a></li>
                            <li><a data-toggle="pill" href="#menu4">Hướng giải quyết</a></li>
                            <?php if(isset($issue->end_date)): ?>
                                <?php if($issue->end_date < now()): ?>
                                    <li><a data-toggle="pill" href="#menu6">Chiến lược phòng ngừa rủi ro quá hạn</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="tab-content mt-10">
                            <div id="menu3" class="tab-pane fade in active mb-20">
                                <div class="box-body">
                                    Công việc 1 được tạo bởi <b>
                                        Lý Minh Hà
                                    </b> <span>Giải quyết bời
                                        <b>
                                            tôi
                                        </b>, quan sát bởi
                                        <b>
                                            Trần Hải Nam
                                        </b>, phê duyệt bởi
                                        <b>
                                            Lý Minh Hà
                                        </b>
                                    </span>
                                </div>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <h3>Hướng giải quyết</h3>
                                <div class="w-50">
                                    <textarea class="form-control"><?php echo e($issue->solution); ?></textarea>
                                </div>
                            </div>
                            <div id="menu5" class="tab-pane fade">

                                <div class="box-body">
                                    <?php if(!empty($issue->getRequiredIssue())): ?>
                                        <?php ($requiredIssue = $issue->getRequiredIssue()); ?>
                                        <label class="text-danger bl">Khóa</label>
                                        <div class="">
                                            <div class="col-sm-4">
                                                <p><?php echo e($requiredIssue->title); ?></p>
                                            </div>
                                            <div class="col-sm-4 cv_percent bg-primary" title="<?php echo e($requiredIssue->getLabelPercent()); ?> hoàn thành">
                                                <div style="width: <?php echo e($requiredIssue->getLabelPercent()); ?>;" class="percent_cv"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p><?php echo e($requiredIssue->title); ?></p>
                                                <p class="author123"><?php echo e($requiredIssue->getNameCreated()); ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($issue->getSubordinateIssue())): ?>
                                        <?php $__currentLoopData = $issue->getSubordinateIssue(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label>Phụ thuộc</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                </div>
                                                <div class="col-sm-4 cv_percent <?php echo e($datum->getColorClass()); ?>" title="<?php echo e($datum->getLabelPercent()); ?> hoàn thành">
                                                    <div style="width: <?php echo e($datum->getLabelPercent()); ?>;" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                    <p class="author123"><?php echo e($datum->getNameCreated()); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if(!empty($issue->getRelativeIssue())): ?>
                                        <?php $__currentLoopData = $issue->getRelativeIssue(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label>Issue liên quan</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                </div>
                                                <div class="col-sm-4 cv_percent <?php echo e($datum->getColorClass()); ?>" title="<?php echo e($datum->getLabelPercent()); ?> hoàn thành">
                                                    <div style="width: <?php echo e($datum->getLabelPercent()); ?>;" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                    <p class="author123"><?php echo e($datum->getNameCreated()); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if(!empty($issue->getSimilarIssue())): ?>
                                        <?php $__currentLoopData = $issue->getSimilarIssue(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label>Tương tự</label>
                                            <div class="">
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                </div>
                                                <div class="col-sm-4 cv_percent <?php echo e($datum->getColorClass()); ?>" title="<?php echo e($datum->getLabelPercent()); ?> hoàn thành">
                                                    <div style="width: <?php echo e($datum->getLabelPercent()); ?>;" class="percent_cv"></div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p><?php echo e($datum->title); ?></p>
                                                    <p class="author123"><?php echo e($datum->getNameCreated()); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div>
                                        <button data-href="<?php echo e(route('issues.updateRelative', $issue->id)); ?>" class="btn btn-primary js-modal-relative">Liên kết issue</button>
                                    </div>
                                </div>
                            </div>
                            <div id="menu6" class="tab-pane fade">
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
                                        <?php if($issue->defend): ?>
                                            <?php $__currentLoopData = $issue->defend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e(\App\Task::GIAIQUYET[$value['type']]); ?></td>
                                                    <td><?php echo e(\App\Issue::DEFEND_SCHEDULE_STATUS[$value['schedule_status']]); ?></td>
                                                    <td><?php echo e(\App\Issue::DEFEND_PRIORITY[$value['priority']]); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <button type="button" data-issue="<?php echo e($issue->id); ?>" data-task = "<?php echo e($task->id); ?>" data-href="<?php echo e(route('tasks.issues.defend')); ?>"  class="btn btn-primary js-btn-issue-defend mb-20">Thêm chiến lược phòng ngừa rủi ro</button>
                            </div>
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
    <div id="modalRelative" class="modal fade">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3>Liên kết vấn đề<button type="button" class="close float-right" data-dismiss="modal">&times;</button></h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="w-50">
                        <h4>Loại liên kết</h4>
                        <select class="form-control js-set-relative">
                            <option value="1">Vấn đề liên quan</option>
                            <option value="2">Vấn đề tương tự</option>
                            <option value="3">Vấn đề khóa</option>
                            <option value="4">Vấn đề phụ thuộc</option>
                        </select>
                    </div>
                    <form action="" method="POST" class="w-50" id="formRelative">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <h4>Chọn vấn đề</h4>
                        <div class="js-select-relative" id="relative1">
                            <select class="js-multiple form-control" multiple="multiple" name="relative_issue_ids[]">
                                <option value="">None</option>
                                <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($issue->id != $datum->id): ?>
                                        <option <?php if(in_array($datum->_id, (array)$issue->relative_issue_ids)): ?> selected <?php endif; ?> value="<?php echo e($datum->id); ?>"><?php echo e($datum->title); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative2">
                            <select class="js-multiple form-control" multiple="multiple" name="similar_issue_ids[]">
                                <option value="">None</option>
                                <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($issue->id != $datum->id): ?>
                                        <option <?php if(in_array($datum->_id, (array)$issue->similar_issue_ids)): ?> selected <?php endif; ?> value="<?php echo e($datum->id); ?>"><?php echo e($datum->title); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative3">
                            <select class="form-control" name="required_issue_id">
                                <option value="">None</option>
                                <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($issue->id != $datum->id): ?>
                                        <option <?php if(in_array($datum->_id, (array)$issue->subordinate_issue_ids)): ?> disabled <?php endif; ?> <?php if($issue->required_issue_id == $datum->_id): ?> selected <?php endif; ?> value="<?php echo e($datum->id); ?>"><?php echo e($datum->title); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="js-select-relative d-none" id="relative4">
                            <select class="js-multiple form-control" multiple="multiple" name="subordinate_issue_ids[]">
                                <option value="">None</option>
                                <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if((empty($datum->required_issue_id) || $issue->id == $datum->required_issue_id) && $issue->id != $datum->id): ?>
                                        <option <?php if($issue->required_issue_id == $datum->_id): ?> disabled <?php endif; ?> <?php if(in_array($datum->_id, (array)$issue->subordinate_issue_ids)): ?> selected <?php endif; ?> value="<?php echo e($datum->id); ?>"><?php echo e($datum->title); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-20">Tạo liên kết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('click', '.js-btn-issue-defend', function() {
            let url = $(this).data('href');
            let data = {
                'task_id' : $(this).data('task'),
                'issue_id' : $(this).data('issue')
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
        $(document).on('click', '.js-modal-relative', function () {
            $('#formRelative').attr('action', $(this).data('href'));
            $('#modalRelative').modal('show')
        })
        $(document).on('change', '.js-set-relative', function () {
            $('.js-select-relative').addClass('d-none');
            $('#relative' + $(this).val()).removeClass('d-none');
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/issues/detail.blade.php ENDPATH**/ ?>