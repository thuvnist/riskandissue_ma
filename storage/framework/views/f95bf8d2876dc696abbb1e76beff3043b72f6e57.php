<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="box box-info mt-20 pb-20">
            <div class="px-15">
                <h3>
                    Danh sách công việc
                </h3>
            </div>
            <div class="table-responsive mt-50 px-15">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th>Công việc</th>
                        <th>Mô tả</th>
                        <th>Người tạo</th>
                        <th>Dự án</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->name); ?></td>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->description); ?></td>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->created_by_name); ?></td>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->project->name); ?></td>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->time_start); ?></td>
                                <td class="<?php echo e($task->color_name); ?>"><?php echo e($task->label_status_name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/home.blade.php ENDPATH**/ ?>