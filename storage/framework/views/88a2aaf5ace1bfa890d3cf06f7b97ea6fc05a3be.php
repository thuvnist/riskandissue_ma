<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mt-20">
    <div class="col-sm-12">
        <div class="box box-info col-sm-12">
            <h3 class="text-center"><span class="text-info">Dự án:<?php echo e($project->name); ?></span></h3>
            <p>Mô tả: <?php echo e($project->description); ?></p>
            <p>Người tạo: <?php echo e($project->created_by_name); ?></p>
            <p>Thành viên:
                <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($user->name); ?>/
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <p>Thời gian bắt đầu: <?php echo e($project->time_start); ?></p>
            <p>Thời gian kết thúc: <?php echo e($project->time_end); ?></p>
            <p>% hoàn thành: <?php echo e($project->percent); ?></p>
            <p>Chi phí: <?php echo e($project->cost); ?> VND</p>
            <p>Đã phân bổ: <?php echo e($tasks->sum('cost')); ?> VND</p>
        </div>
    </div>
</div>
<div class="row mt-20">
    <div class="col-sm-8">
        <div class="box box-info col-sm-12">
            <h3>Biểu đồ thống kê công việc</h3>
            <canvas id="task"></canvas>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-success col-sm-12">
            <h3>Thống kê công việc</h3>
            <?php $__currentLoopData = \App\Task::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 1): ?>
            <?php ($configTask = $tasks->where('status', $key)->count()); ?>
            <?php else: ?>
            <?php ($configTask .= ',' . $tasks->where('status', $key)->count()); ?>
            <?php endif; ?>
            <p><?php echo e($value); ?>: <?php echo e($tasks->where('status', $key)->count()); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class="row mt-20">
    <div class="col-sm-8">
        <div class="box box-info col-sm-12">
            <h3>Biểu đồ thống kê vấn đề phát sinh</h3>
            <canvas id="issue"></canvas>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-danger col-sm-12">
            <h3>Thống kê vấn đề phát sinh</h3>
            <p>Tổng: <?php echo e($project->countAllIssue()); ?></p>
            <?php $__currentLoopData = \App\Issue::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 1): ?>
            <?php ($configIssue = $project->countIssueByStatus($key)); ?>
            <?php else: ?>
            <?php ($configIssue .= ',' . $project->countIssueByStatus($key)); ?>
            <?php endif; ?>
            <p><?php echo e($value); ?>: <?php echo e($project->countIssueByStatus($key)); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<input type="hidden" id="configTask" value="<?php echo e($configTask); ?>">
<input type="hidden" id="configIssue" value="<?php echo e($configIssue); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        loadCanvasCircle();
    })
    window.loadCanvasCircle = () => {
        let $configTask = $('#configTask').val().split(',');
        let $configIssue = $('#configIssue').val().split(',');
        let configTask = {
            type: 'pie',
            data: {
                datasets: [{
                    data: $configTask,
                    backgroundColor: [
                        '#3257D8', '#ff0000', '#D832D1', '#32d843', '#F62463', '#fbd102'
                    ],
                    label: 'Company'
                }],
                labels: [
                    'Đang thực hiện', 'Quá hạn', 'Chờ phê duyệt', 'Hoàn thành', 'Tạm dừng', 'Đã hủy'
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            let dataset = data.datasets[tooltipItem.datasetIndex];
                            let meta = dataset._meta[Object.keys(dataset._meta)[0]];
                            let total = meta.total;
                            let currentValue = dataset.data[tooltipItem.index];
                            let percentage = parseFloat((currentValue / total * 100).toFixed(1));
                            return currentValue + ' (' + percentage + '%)';
                        },
                        title: function(tooltipItem, data) {
                            return data.labels[tooltipItem[0].index];
                        }
                    }
                },
            }
        };
        let configIssue = {
            type: 'pie',
            data: {
                datasets: [{
                    data: $configIssue,
                    backgroundColor: [
                        '#3257D8', '#CFEB27', '#D832D1', '#86CA2F', '#32D843', '#ff0000'
                    ],
                    label: 'Company'
                }],
                labels: [
                    'Mở', 'Đang điều tra', 'Đang giải quyết', 'Đang chờ phê duyệt', 'Đã giải quyết', 'Quá hạn'
                ]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            let dataset = data.datasets[tooltipItem.datasetIndex];
                            let meta = dataset._meta[Object.keys(dataset._meta)[0]];
                            let total = meta.total;
                            let currentValue = dataset.data[tooltipItem.index];
                            let percentage = parseFloat((currentValue / total * 100).toFixed(1));
                            return currentValue + ' (' + percentage + '%)';
                        },
                        title: function(tooltipItem, data) {
                            return data.labels[tooltipItem[0].index];
                        }
                    }
                },
            }
        };
        let task = $('#task')[0];
        console.log('task: ', task);
        if (task != undefined) {
            task.getContext('2d');
            window.myPie = new Chart(task, configTask);
        }

        let issue = $('#issue')[0];
        if (issue != undefined) {
            issue.getContext('2d');
            window.myPie = new Chart(issue, configIssue);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/projects/show.blade.php ENDPATH**/ ?>