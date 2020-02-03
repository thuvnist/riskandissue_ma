<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
                <div class="box box-info mt-20 p-15">
                    <h3>Thêm mới dự án</h3>
                    <form action="<?php echo e(route('projects.store')); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Tên dự án</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Mô tả</label>
                            <div class="col-sm-6">
                                <textarea id="description" class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Quản lý dự án</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="user_ids" name="leader_id">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label">Thành viên</label>
                            <div class="col-sm-6">
                                <select class="js-multiple form-control " id="user_ids" name="user_ids[]"  multiple="multiple">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian bắt đầu</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_start" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Thời gian kết thúc</label>
                            <div class="col-sm-6">
                                <input type="date" id="name" class="form-control" name="time_end" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Chi phí</label>
                            <div class="col-sm-6">
                                <input id="name" class="form-control" name="cost" required>
                            </div>
                        </div>
                        <div class="form-group mt-20">
                            <label for="name" class="col-sm-3 control-label">Trạng thái</label>
                            <div class="col-sm-6">
                                <select class="form-control " id="user_ids" name="status">
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_ids" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/create.blade.php ENDPATH**/ ?>