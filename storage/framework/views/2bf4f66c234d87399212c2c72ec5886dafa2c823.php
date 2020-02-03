<ul class="nav nav-pills">
    <li class="active w-24"><a data-toggle="pill" href="#myModal1"><?php echo e(\App\Task::GIAIQUYET[1]); ?></a></li>
    <li class="w-24"><a data-toggle="pill" href="#myModal2"><?php echo e(\App\Task::GIAIQUYET[2]); ?></a></li>
    <li class="w-24"><a data-toggle="pill" href="#myModal3"><?php echo e(\App\Task::GIAIQUYET[3]); ?></a></li>
    <li class="w-24"><a data-toggle="pill" href="#myModal4"><?php echo e(\App\Task::GIAIQUYET[4]); ?></a></li>
</ul>
<div class="tab-content mt-10">
    <div id="myModal1" class="tab-pane fade in active">
        <div class="row">
            <form action="<?php echo e(route('tasks.risks.update', $task->id)); ?>" class="form-horizontal" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                    <div class="col-md-6">
                        Chấp nhận rủi ro
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Mức ưu tiên</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[priority]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_PRIORITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label for="" class="label-control col-md-3">Người đề xuất</label>
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo e(auth()->id()); ?>" name="defend[user]">
                        <?php echo e(auth()->user()->name); ?>

                    </div>
                </div>
                <input type="hidden" value="<?php echo e($riskKey); ?>" class="js-set-id" name="key">
                <input type="hidden" value="1" name="defend[type]">
                <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                    <button class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <div id="myModal2" class="tab-pane fade">
        <div class="row">
            <form action="<?php echo e(route('tasks.risks.update', $task->id)); ?>" class="form-horizontal" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                    <div class="col-md-6">
                        Tránh rủi ro
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Kế hoạch hành động</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="defend[schedule]" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[schedule_status]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_SCHEDULE_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Mức ưu tiên</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[priority]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_PRIORITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Người đề xuất</label>
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo e(auth()->id()); ?>" name="defend[user]">
                        <?php echo e(auth()->user()->name); ?>

                    </div>
                </div>
                <input type="hidden" value="<?php echo e($riskKey); ?>" class="js-set-id" name="key">
                <input type="hidden" value="2" name="defend[type]">
                <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                    <button class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <div id="myModal3" class="tab-pane fade">
        <div class="row">
            <form action="<?php echo e(route('tasks.risks.update', $task->id)); ?>" class="form-horizontal" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label for="" class="label-control col-md-3">Loại chiến lược phòng ngừa</label>
                    <div class="col-md-6">
                        Chuyển giao rủi ro
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Kế hoạch hành động</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="defend[schedule]" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[schedule_status]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_SCHEDULE_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Mức ưu tiên</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[priority]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_PRIORITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Người đề xuất</label>
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo e(auth()->id()); ?>" name="defend[user]">
                        <?php echo e(auth()->user()->name); ?>

                    </div>
                </div>
                <input type="hidden" value="<?php echo e($riskKey); ?>" class="js-set-id" name="key">
                <input type="hidden" value="3" name="defend[type]">
                <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                    <button class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <div id="myModal4" class="tab-pane fade">
        <div class="row">
            <form action="<?php echo e(route('tasks.risks.update', $task->id)); ?>" class="form-horizontal" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Loại chiến lược phòng ngừa</label>
                    <div class="col-md-6">
                        <p>Giảm thiểu rủi ro</p>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Kế hoạch hành động</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Vui lòng nhập vào kế hoạch hành động"></textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Trạng thái kế hoạch hành động</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[schedule_status]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_SCHEDULE_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Mức ưu tiên</label>
                    <div class="col-md-6">
                        <select class="form-control" name="defend[priority]" id="">
                            <?php $__currentLoopData = \App\Issue::DEFEND_PRIORITY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="margin-right: 0; margin-left: 0;">
                    <label class="col-md-3" for="">Người đề xuất</label>
                    <div class="col-md-6">
                        <input type="hidden" value="<?php echo e(auth()->id()); ?>" name="defend[user]">
                        <?php echo e(auth()->user()->name); ?>

                    </div>
                </div>
                <input type="hidden" value="<?php echo e($riskKey); ?>" class="js-set-id" name="key">
                <input type="hidden" value="4" name="defend[type]">
                <div class="form-group text-center" style="margin-right: 0; margin-left: 0;">
                    <button class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/defend.blade.php ENDPATH**/ ?>