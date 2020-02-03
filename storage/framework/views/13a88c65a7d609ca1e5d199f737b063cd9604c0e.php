<div class="container-fluid">
    <div class="row">
        <div class="box-info box">
            <div class="box-header">
                <div class="text-left">
                    <h3>Tạo risk</h3>
                </div>
            </div>
            <div class="box-body">
                <form action="<?php echo e(route('tasks.risks.store', $task->id)); ?>" method="post" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="title" class="control-label col-md-2 require">Tiêu đề</label>
                        <div class="col-md-3">
                            <input type="text" required name="title" class="form-control" value="" id="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="typeSelect" class="control-label col-md-2 require">
                            Loại
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" required name="type" id="typeSelect">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người phát hiện
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="detected_user" id="assigneeSelect">
                                <option value="">None</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue->user)): ?> <?php if($issue->user->id == $user->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người quan sát
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="inspect_user" id="assigneeSelect">
                                <option value="">None</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue->user)): ?> <?php if($issue->user->id == $user->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người phê duyệt
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="approved_user" id="assigneeSelect">
                                <option value="">None</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue->user)): ?> <?php if($issue->user->id == $user->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người phòng ngừa
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="user_id" id="assigneeSelect">
                                <option value="">None</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue->user)): ?> <?php if($issue->user->id == $user->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desc" class="control-label col-md-2">Hạn phòng ngừa</label>
                        <div class="col-sm-5">
                            <input type="date" name="deadline" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="typeSelect" class="control-label col-md-2 require">
                            Mức độ nghiêm trọng
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" required name="danger" id="typeSelect">
                                <?php $__currentLoopData = $dangers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="typeSelect" class="control-label col-md-2 require">
                            Xu hướng xảy ra
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" required name="feature" id="typeSelect">
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priorityLevel" class="control-label col-md-2">
                            Mức ưu tiên
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
                        <label for="priorityLevel" class="control-label col-md-2">
                            Trạng thái
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="status" id="priorityLevel">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue)): ?> <?php if($issue->status == $key): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="desc" class="control-label col-md-2">Mô tả</label>
                        <div class="col-sm-5">
                            <textarea id="desc" name="desc" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="note" class="control-label col-md-2">Chú ý</label>
                        <div class="col-sm-5">
                            <textarea id="note" name="note" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assigneeSelect" class="control-label col-md-2">
                            Người thực hiện
                        </label>
                        <div class="col-sm-3">
                            <select class="form-control" name="user_id" id="assigneeSelect">
                                <option value="">None</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(isset($issue->user)): ?> <?php if($issue->user->id == $user->id): ?> selected <?php endif; ?> <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="startDate" class="control-label col-md-2">Ngày bắt đầu</label>
                        <div class="col-sm-3">
                            <input type="date" name="start_date" autocomplete="off" class="form-control" id="startDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endDate" class="control-label col-md-2">Ngày kết thúc</label>
                        <div class="col-sm-3">
                            <input type="date" name="end_date" autocomplete="off" class="form-control" id="endDate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label col-md-2">Thời gian thực hiện (giờ)</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="time" id="time">
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/risks/ajax-create.blade.php ENDPATH**/ ?>