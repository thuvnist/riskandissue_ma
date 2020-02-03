<div class="col-md-12">
    <ul class="nav navbar-nav navbar-btn nav-child">
        <li><a href="<?php echo e(route('tasks.index')); ?>" class="text-black <?php echo e(request()->route()->getName() == 'tasks.index' ? 'nav-active' : ''); ?>">Tất cả(3)</a></li>
        <li><a href="<?php echo e(route('tasks.issues_create', 1)); ?>" class="text-black <?php echo e(request()->route()->getName() == 'tasks.issues_create' ? 'nav-active' : ''); ?>">Thêm mới issue</a></li>
        <li><a href="<?php echo e(route('tasks.board')); ?>" class="text-black <?php echo e(request()->route()->getName() == 'tasks.board' ? 'nav-active' : ''); ?>">Board</a></li>
    </ul>
</div>

<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/layouts/nav_tasks.blade.php ENDPATH**/ ?>