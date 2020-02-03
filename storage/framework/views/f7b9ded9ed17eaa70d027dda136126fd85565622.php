<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box-info box">
                <div class="box-body">
                    <form action="<?php echo e(route('projects.tasks.update', [$project->id, $task->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PATCH')); ?>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="">Tên công việc:</label>
                                    <div class="">
                                        <input type="text" name="name" value="<?php echo e($task->name); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Mô tả:</label>
                                    <div>
                                        <textarea name="description" id="" cols="60" rows="10"><?php echo e($task->description); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="startDate" class="control-label">Ngày bắt đầu</label>
                                    <div class="">
                                        <input type="date" name="time_start" value="<?php echo e($task->time_start); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="endDate" class="control-label">Ngày kết thúc</label>
                                    <div class="">
                                        <input type="date" name="time_end" value="<?php echo e($task->time_end); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">Thời gian thực hiện</label>
                                    <div class="">
                                        <input type="number" class="form-control" value="<?php echo e($task->estimate); ?>" name="estimate" id="time">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="statusSelect" class="control-label">
                                        Chi phí (VND)
                                    </label>
                                    <div>
                                        <input type="number" name="cost" value="<?php echo e($task->cost); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="">Những nhân viên có quyền xem task này:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="show_user_ids[]" multiple="multiple">
                                            <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($user->id, $task->show_user_ids)): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="js-div-add-user">
                                    <?php $__currentLoopData = $task->getWorkUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group">
                                            <label class="control-label" for="">Người thực hiện:</label>
                                            <div class="form-inline">
                                                <select class="form-control" name="work_user_ids[id][]">
                                                    <option value=""></option>
                                                    <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($workUser['user']['id'] == $user->id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                Số giờ:
                                                <input type="number" value="<?php echo e($workUser['time']); ?>" class="form-control" name="work_user_ids[time][]">
                                                <button type="button" class="btn btn-danger js-minus-user"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <button type="button" class="btn btn-primary mt-20 js-add-user"><i class="fa fa-plus-circle"></i></button>
                                <div class="form-group">
                                    <label class="control-label" for="">Người phê duyệt:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="approve_user_ids[]" multiple="multiple">
                                            <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($user->id, $task->approve_user_ids)): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="">Người quan sát:</label>
                                    <div>
                                        <select class="js-multiple form-control" name="view_user_ids[]" multiple="multiple">
                                            <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($user->id, $task->view_user_ids)): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">
                                        Trạng thái
                                    </label>
                                    <div>
                                        <select class="form-control" name="status" id="status">
                                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($task->status == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priorityLevel" class="control-label">
                                        Mức độ ưu tiên
                                    </label>
                                    <div>
                                        <select class="form-control" name="priority" id="priorityLevel">
                                            <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $priotity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($task->priority == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($priotity); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });
        $('.js-add-user').click(function () {
            let text = `
            <div class="form-group">
                <label class="control-label" for="">Người thực hiện:</label>
                <div class="form-inline">
                    <select class="form-control" name="work_user_ids[id][]">
                        <option value=""></option>
                        <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    Số giờ:
                    <input type="number" class="form-control" name="work_user_ids[time][]">
                    <button type="button" class="btn btn-danger js-minus-user"><i class="fa fa-minus-circle"></i></button>
                </div>
            </div>`;
            $('.js-div-add-user').append(text);
        });
        $(document).on('click', '.js-minus-user', function () {
            $(this).closest('.form-group').html('');
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/task/edit.blade.php ENDPATH**/ ?>