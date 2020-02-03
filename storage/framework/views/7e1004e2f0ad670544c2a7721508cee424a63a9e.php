<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mt-20">
            <div class="box box-info col-sm-8">
                <h3>Tên dự án: <?php echo e($project->name); ?></h3>
                <p>Mô tả: <?php echo e($project->description); ?></p>
                <p>Người tạo: <?php echo e($project->created_by_name); ?></p>
                <p>Thành viên:
                    <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($user->name); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
        </div>
        <div class="row mt-20">
            <div class="box box-default">
                <div class="table-responsive p-15">
                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Tên issue</th>
                                <th>Độ ưu tiên</th>
                                <th>Trạng thái</th>
                                <th>Người thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($issue->title); ?></td>
                                <td><?php echo e($issue->piority_name); ?></td>
                                <td><?php echo e($issue->status_name); ?></td>
                                <td><?php echo e($issue->user->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/issue/index.blade.php ENDPATH**/ ?>