<div class="col-md-12">
    <ul class="nav navbar-nav navbar-btn nav-child">
        <li class="<?php echo e(request()->route()->getName() == 'issues.index' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('issues.index')); ?>">Tất cả(5)</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'issues.sample' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('issues.sample')); ?>">Danh sách mẫu issue</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'issues.create_sample' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('issues.create_sample')); ?>">Tạo mẫu issue</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'issues.board' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('issues.board')); ?>" class="text-black">Board</a></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/layouts/nav_issues.blade.php ENDPATH**/ ?>