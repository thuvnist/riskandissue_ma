<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mt-20">
            <div class="box box-default">
                <div class="table-responsive p-15">
                    <h3 class="text-primary text-center">Danh sách công việc của dự án: <?php echo e($project->name); ?></h3>
                    <br>
                    <br>
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Công việc</th>
                                <th>Độ ưu tiên</th>
                                <th>Trạng thái</th>
                                <th>Người thực hiện</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Số giờ (h)</th>
                                <th>Vấn đề phát sinh</th>
                                <th>Rủi ro</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="<?php echo e($task->getColorClass()); ?>"><a href="<?php echo e(route('projects.tasks.show', [$project->id, $task->id])); ?>"> <?php echo e($task->name); ?></a></td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><?php echo e($task->getLabelPriority()); ?></td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><?php echo e($task->getLabelStatus()); ?></td>
                                <td class="<?php echo e($task->getColorClass()); ?>">
                                    <?php if(!empty($task->user_ids)): ?>
                                        <?php $__currentLoopData = $task->user_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(\App\User::find($userId)->name); ?><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><?php echo e($task->time_start); ?></td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><?php echo e($task->time_end); ?></td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><?php echo e($task->estimate); ?></td>
                                <td class="<?php echo e($task->getColorClass()); ?>">
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($issue->title); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="<?php echo e($task->getColorClass()); ?>">3</td>
                                <td class="<?php echo e($task->getColorClass()); ?>"><a href="<?php echo e(route('projects.tasks.edit', [$project->id, $task->id])); ?>">
                                    <i class="fa fa-edit"></i>
                                </a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/projects/task/index.blade.php ENDPATH**/ ?>