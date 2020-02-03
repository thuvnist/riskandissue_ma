
<div class="form-group">
    <label for="title" class="control-label col-md-2 require">Tiêu đề</label>
    <div class="col-md-3">
        <input type="text" required name="title" class="form-control" value="<?php if(isset($issue)): ?> <?php echo e($issue->title); ?> <?php endif; ?>" id="title">
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-md-2">Mô tả</label>
    <div class="col-sm-5">
        <textarea id="description" name="description" class="form-control" rows="4" cols="50"><?php if(isset($issue)): ?> <?php echo e($issue->description); ?> <?php endif; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label for="priorityLevel" class="control-label col-md-2">
        Độ ưu tiên
    </label>
    <div class="col-sm-3">
        <select class="form-control" name="priority" id="priorityLevel">
            <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(isset($issue)): ?> <?php if($issue->priority == $key): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="statusSelect" class="control-label col-md-2">
        Trạng thái
    </label>
    <div class="col-sm-3">
        <select class="form-control" name="status" id="statusSelect">
            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(isset($issue)): ?> <?php if($issue->status == $key): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>



<?php if(isset($columns)): ?>
    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group">
            <label for="startDate" class="control-label col-md-2 <?php if($column['required'] == 'true'): ?> require <?php endif; ?>"><?php echo e($column['name']); ?></label>
            <div class="col-sm-3">
                <input type="<?php echo e($column['type']); ?>" value="<?php if(isset($issue)): ?><?php echo e($issue->columns[$key]['value']); ?><?php endif; ?>" autocomplete="off" name="columns[]" <?php if($column['required'] == 'true'): ?> required <?php endif; ?> class="form-control" id="startDate">
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/templates/view_form.blade.php ENDPATH**/ ?>