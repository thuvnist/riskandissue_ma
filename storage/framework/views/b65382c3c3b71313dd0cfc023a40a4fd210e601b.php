<div class="col-md-12">
    <ul class="nav navbar-nav navbar-btn nav-child">
        <li class="<?php echo e(request()->route()->getName() == 'reports.connect_management' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.connect_management')); ?>">Kết nối</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'reports.option' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.option')); ?>">Tùy chọn kết nối</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'reports.analysis' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.analysis')); ?>">Phân tích</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'reports.design' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.design')); ?>">Thiết kế báo cáo</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'reports.storage' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.storage')); ?>">Kho lưu trữ</a></li>
        <li class="<?php echo e(request()->route()->getName() == 'reports.report' ? 'nav-active' : ''); ?>"><a href="<?php echo e(route('reports.report')); ?>">Danh sách báo cáo</a></li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/layouts/nav_report.blade.php ENDPATH**/ ?>