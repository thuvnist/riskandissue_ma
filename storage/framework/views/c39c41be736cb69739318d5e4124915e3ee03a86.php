<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
                <div class="box box-info mt-20 p-15">
                    <h3>Thêm mới dự án</h3>
                    <form action="<?php echo e(route('projects.update', $project->id)); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PATCH')); ?>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Tên dự án</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="name" value="<?php echo e($project->name); ?>" required>
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Khách hàng</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="customer" value="<?php echo e($project->customer); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Mô tả</label>
                            <div class="col-sm-6">
                                <textarea id="description" class="form-control" name="description" required><?php echo e($project->description); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Leader</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="user_ids" name="leader_id">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if( $project->description == $user->id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Thành viên</label>
                            <div class="col-sm-6">
                                <select class="js-multiple form-control " id="user_ids" name="user_ids[]"  multiple="multiple">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if( in_array($user->id, $project->user_ids)): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian bắt đầu</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_start" value="<?php echo e($project->time_start); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian kết thúc</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_end" value="<?php echo e($project->time_end); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Chi phí</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="cost" value="<?php echo e($project->cost); ?>" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Trạng thái</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="user_ids" name="status">
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if( $project->status == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/edit.blade.php ENDPATH**/ ?>