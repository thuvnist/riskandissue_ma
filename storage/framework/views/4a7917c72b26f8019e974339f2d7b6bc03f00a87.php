<div class="col-md-12">
    <ul class="nav navbar-nav navbar-btn nav-child">
        <li><a href="<?php echo e(route('projects.show', $id)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'projects.show' ? 'nav-active' : ''); ?>">Thống kê</a></li>
        <li><a href="<?php echo e(route('projects.tasks.index', $id)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'projects.tasks.index' ? 'nav-active' : ''); ?>">Danh sách công việc</a></li>
        <li><a href="<?php echo e(route('projects.tasks.create', $id)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'projects.tasks.create' ? 'nav-active' : ''); ?>">Thêm mới công việc</a></li>
        <li><a href="<?php echo e(route('projects.board', $id)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'projects.board' ? 'nav-active' : ''); ?>">Bảng theo dõi vấn đề phát sinh</a></li>
        <li><a href="<?php echo e(route('projects.tasks.risk', $id)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'projects.tasks.risk' ? 'nav-active' : ''); ?>">Quy trình phòng ngừa rủi ro</a></li>
        <li><a href="" class="">Quy trình giải quyết vấn đề phát sinh</a></li>
    </ul>
</div>

<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/layouts/nav_projects.blade.php ENDPATH**/ ?>