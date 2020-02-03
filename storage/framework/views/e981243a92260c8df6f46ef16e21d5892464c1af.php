<table class="table table-bordered table-hover" id="myTable">
    <thead>
    <tr>
        <th>Tên mẫu issue</th>
        <th>Mô tả</th>
        <th>Số issues theo mẫu</th>
        <th>Người tạo</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($template->name); ?></td>
            <td><?php echo e($template->description); ?></td>
            <td><?php echo e($template->getNumberIssueAttributes()); ?></td>
            <td><?php echo e($template->created_by_name); ?></td>
            <td>
                <div>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-trash text-red"></i></a>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/components/template_table.blade.php ENDPATH**/ ?>