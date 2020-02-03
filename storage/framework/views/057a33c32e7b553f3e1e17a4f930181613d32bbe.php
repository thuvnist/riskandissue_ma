<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h3 class="text-center">Quy trình phòng ngừa rủi ro</h3>
        <div style="width: 1000px; height: 700px; margin: auto" class="position-relative">
            <div class="box-circleci box-1 box-bg-4">
                Start
            </div>
            <div class="box-square box-2 box-active box-bg-5">
                1. Xác định, rủi ro
            </div>
            <div class="box-square box-3 box-active">
                2. Phân tích và đặt mức ưu tiên rủi ro
            </div>
            <div class="box-square box-4 box-active">
                3. Lên kế hoạch phản hồi
            </div>
            <div class="box-square box-5 box-active">
                4. Thực thi, theo dõi và kiểm soát
            </div>
            <div class="box-square box-6 box-active">
                5. Phê duyệt rủi ro
            </div>
            <div class="box-square box-7 box-active">
                6. Đóng rủi ro
            </div>
            <div class="box-rotate box-8">
            </div>
            <div class="box-square box-9 box-active">
                7. Scale thành vấn đề phát sinh
            </div>
            <div class="box-circleci box-10">
                Stop
            </div>
            <div class="line-temp-1 line-1">
                <i class="fa fa-angle-right"></i>
            </div>
            <div class="line-temp-2 line-2">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="line-temp-2 line-3">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="line-temp-2 line-4">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="line-temp-2 line-5">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="line-temp-1 line-6">
                <i class="fa fa-angle-right"></i>
            </div>
            <div class="line-temp-1 line-7">
                rủi ro xảy ra
                <i class="fa fa-angle-right"></i>
            </div>
            <div class="line-temp-1 line-8">
                <i class="fa fa-angle-right"></i>
            </div>
            <div class="line-temp-2 line-9">
                <i class="fa fa-angle-down"></i>
            </div>
            <div class="line-10">
                <i class="fa fa-angle-left"></i>
            </div>
        </div>
        <div>
            <table class="table">
                <tr>
                    <th>Tiêu đề rủi ro</th>
                    <th>Hành động</th>
                    <th>Trạng thái</th>
                    <th>Tiến độ</th>
                    <th>Người phòng ngừa</th>
                    <th>Ưu tiên</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Thời gian</th>
                </tr>
                <tbody class="js-tbody bg-white">
                <?php for($i = 1; $i < 7; $i++): ?>
                    <tr>
                        <td>Rủi ro <?php echo e($i); ?></td>
                        <td></td>
                        <td>Mở</td>
                        <td><?php echo e($i*10); ?>%</td>
                        <td></td>
                        <td></td>
                        <td><?php echo e($i); ?>/5/2019</td>
                        <td><?php echo e('2' . $i . '/5/2019'); ?></td>
                        <td><?php echo e(2 + $i); ?> tiếng</td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('click', '.box-active', function () {
            $('.js-tbody').addClass('d-none')
            $('.box-active').removeClass('box-bg-5')
            $(this).addClass('box-bg-5')
            setTimeout(function () {
                $('.js-tbody').removeClass('d-none')
            }, 1000)
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/projects/task/risk.blade.php ENDPATH**/ ?>