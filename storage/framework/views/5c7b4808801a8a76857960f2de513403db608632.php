<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row mt-20">
            <div class="box box-info col-sm-12">
                <h3>Board Issue</h3>
            </div>
        </div>
        <div class="row">
            <div class="box box-default" style="position: relative">
                <div class="box-loading d-none">
                    <div class="spinner-border"></div>
                </div>
                <div class="alert d-none">
                </div>
                <div class="row mt-20">
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-1 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[1]); ?></span>
                                    <div class="bg-white float-right width-20 text-center cursor-pointer">
                                        +
                                    </div>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable1">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-2 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[2]); ?></span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable2">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-3 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[3]); ?></span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable3">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-4 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[4]); ?></span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable4">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-5 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[5]); ?></span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable5">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bg-board mh-500">
                            <div class="w-100">
                                <div class="bg-board-6 text-center board-title">
                                    <span class="text-white"><?php echo e(\App\Issue::STATUS[6]); ?></span>
                                </div>
                                <div class="board-content connected-sortable mh-500" id="sortable6">
                                    <?php if(!empty($project->tasks)): ?>
                                    <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $task->issues->where('status', 6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="mt-10 bg-white" id="<?php echo e($issue->id); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">#<?php echo e($issue->title); ?></a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(() => {
            $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6" ).sortable({
                connectWith: ".connected-sortable",
                cursor: "move",
                forcePlaceholderSize: true,
                update: function() {
                    $('.box-loading').removeClass('d-none');
                    let sortable1 = [];
                    let sortable2 = [];
                    let sortable3 = [];
                    let sortable4 = [];
                    let sortable5 = [];
                    let sortable6 = [];
                    $.each($('#sortable1').children(), function(key, value) {
                        sortable1.push(value.id)
                    });
                    $.each($('#sortable2').children(), function(key, value) {
                        sortable2.push(value.id)
                    });
                    $.each($('#sortable3').children(), function(key, value) {
                        sortable3.push(value.id)
                    });
                    $.each($('#sortable4').children(), function(key, value) {
                        sortable4.push(value.id)
                    });
                    $.each($('#sortable5').children(), function(key, value) {
                        sortable5.push(value.id)
                    });
                    $.each($('#sortable6').children(), function(key, value) {
                        sortable6.push(value.id)
                    });
                    $.ajax({
                        url: "<?php echo e(route('tasks.update_status')); ?>",
                        method: "POST",
                        data: {
                            sortable1: sortable1,
                            sortable2: sortable2,
                            sortable3: sortable3,
                            sortable4: sortable4,
                            sortable5: sortable5,
                            sortable6: sortable6,
                        },
                        success: function (response) {
                            $('.alert').removeClass('d-none').addClass(`${response.alert}`).html(`${response.text}`);
                            $('.box-loading').addClass('d-none');
                            setTimeout(function(){
                                $('.alert').addClass('d-none');
                                }, 3000);
                        },
                        error: function () {
                            alert('Server error !!!')
                        }
                    })
                }
            }).disableSelection();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/task/board.blade.php ENDPATH**/ ?>