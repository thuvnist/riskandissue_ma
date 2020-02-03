<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="box box-info mt-20 pb-20">
            <div class="px-15">
                <h3>
                    Danh sách dự án
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a class="btn btn-primary float-right" href="<?php echo e(route('projects.create')); ?>">
                            Thêm dự án
                        </a>
                    <?php endif; ?>
                </h3>
            </div>
            <div class="table-responsive mt-50 px-15">
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                    <tr>
                        <th >Tên dự án</th>
                        <th>Mô tả</th>
                        <th>Người tạo</th>
                        <th>Thành viên</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('projects.show', $project->id)); ?>" class="text-blue">
                                    <?php echo e($project->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($project->description); ?></td>
                            <td><?php echo e($project->created_by_name); ?></td>
                            <td>
                                <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($user->name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($project->created_at->format('d/m/Y')); ?></td>
                            <td><a href="<?php echo e(route('projects.edit', $project->id)); ?>">
                                <i class="fa fa-edit"></i>
                            </a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div>
                <?php echo e($projects->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/projects/index.blade.php ENDPATH**/ ?>