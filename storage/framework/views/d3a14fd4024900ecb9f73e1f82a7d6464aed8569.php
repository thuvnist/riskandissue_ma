<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <form action="<?php echo e(route('tasks.issues.store', $task->id)); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="text" hidden name="task_id" value="<?php echo e($task->id); ?>">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="text-left">
                            Vấn đề phát sinh
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="issuesTemplate" class="control-label col-md-2 require">Chọn mẫu issue</label>
                            <div class="col-md-3">
                                <select required class="form-control template-select" data-url="<?php echo e(route('templates.get_view_template')); ?>" name="template_id" id="issuesTemplate">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="im-template-view">

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
                            <label class="control-label" for="">Người phê duyệt:</label>
                            <div>
                                <select class="form-control" name="approve_user_ids">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="">Người quan sát:</label>
                            <div>
                                <select class="form-control" name="view_user_ids">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="parentWorkSelect" class="control-label col-md-2">
                                        Vấn đề cha
                            </label>
                            <div class="col-sm-3">
                                <?php if(isset($issueParent)): ?>
                                    <input type="hidden" name="parent_issue_id" value="<?php echo e($issueParent->id); ?>">
                                    <b><?php echo e($issueParent->title); ?></b>
                                <?php else: ?>
                                    <select class="form-control" name="parent_issue_id" id="parentWorkSelect">
                                        <option value="">None</option>
                                        <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="childWorkSelect" class="control-label col-md-2">
                                Vấn đề con
                            </label>
                            <div class="col-sm-5">
                                <select class="js-multiple form-control" multiple="multiple" name="children_issue_ids[]" id="childWorkSelect">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(empty($issue->parent_issue_id)): ?>
                                            <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="relativeWorkSelect" class="control-label col-md-2">
                                Issue liên quan
                            </label>
                            <div class="col-sm-5">
                                <select class="js-multiple form-control" multiple="multiple" name="relative_issue_ids[]" id="relativeWorkSelect">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="similarWorkSelect" class="control-label col-md-2">
                                Issue tương tự
                            </label>
                            <div class="col-sm-5">
                                <select class="js-multiple form-control" multiple="multiple" name="similar_issue_ids[]" id="similarWorkSelect">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="subordinateWorkSelect" class="control-label col-md-2">
                                Issue khóa
                            </label>
                            <div class="col-sm-5">
                                <select class="js-multiple form-control" multiple="multiple" name="subordinate_issue_ids[]" id="subordinateWorkSelect">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="requiredWorkSelect" class="control-label col-md-2">
                                Issue phụ thuộc
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control" name="required_issue_id" id="requiredWorkSelect">
                                    <option value="">None</option>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($issue->id); ?>"><?php echo e($issue->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div> -->

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
                        </div>

                        <div class="form-group">
                            <label for="completed" class="control-label col-md-2">
                                % Đã làm
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control" name="completed" id="completed">
                                    <?php $__currentLoopData = $percents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $percent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($percent); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="solution" class="control-label col-md-2">Hướng giải quyết</label>
                            <div class="col-sm-5">
                                <textarea id="solution" class="form-control" name="solution" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="note" class="control-label col-md-2">Chú ý</label>
                            <div class="col-sm-5">
                                <textarea id="note" class="form-control" name="note" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileUpload" class="control-label col-md-2">Tập đính kèm</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" name="documentation" id="fileUpload">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <button type="submit" class="btn btn-primary">Tạo và tiếp tục</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('change', '#parentWorkSelect', function () {
            let parentId = $(this).val();
            $('#childWorkSelect').find('option').each(function () {
                $(this).removeAttr('disabled');
            });
            if (parentId !== '') {
                $('#childWorkSelect').find(`option[value="${parentId}"]`).prop('disabled', 'on');
            }

        });
        $(document).on('change', '#childWorkSelect', function () {
            let childId = $(this).val();
            $('#parentWorkSelect').find('option').each(function () {
                $(this).removeAttr('disabled');
            });
            if (childId !== '') {
                $('#parentWorkSelect').find(`option[value="${childId}"]`).prop('disabled', 'on');
            }
        });
        $(document).on('change', '#requiredWorkSelect', function () {
            let requiredId = $(this).val();
            $('#subordinateWorkSelect').find('option').each(function () {
                $(this).removeAttr('disabled');
            });
            if (requiredId !== '') {
                $('#subordinateWorkSelect').find(`option[value="${requiredId}"]`).prop('disabled', 'on');
            }
        });
        $(document).on('change', '#subordinateWorkSelect', function () {
            let subordinatedId = $(this).val();
            $('#requiredWorkSelect').find('option').each(function () {
                $(this).removeAttr('disabled');
            });
            if (subordinatedId !== '') {
                $('#requiredWorkSelect').find(`option[value="${subordinatedId}"]`).prop('disabled', 'on');
            }
        });
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        $(function () {
           $(document).on('change', '.template-select', function () {
               const $this = $(this);
               let data = {
                   template_id : $this.val(),
               };
               let url = $this.data('url');
               $.ajax({
                   type: 'post',
                   url,
                   data: data,
                   success(data) {
                       $('.im-template-view').html(data);
                       $('.datepicker').datepicker({
                           autoclose: true,
                           format: 'dd-mm-yyyy',
                           todayHighlight: true,
                       });
                   },
               });
           })
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/issues/create.blade.php ENDPATH**/ ?>