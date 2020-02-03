<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <h3>Danh sách mẫu vấn đề phát sinh <a href="<?php echo e(route('templates.create')); ?>" class="btn btn-primary float-right">Tạo mẫu mới</a></h3>
                </div>
            </div>

            <div class="box box-default">
                <div class="table-responsive im-append-ajax p-15">
                    <?php echo $__env->make('components.template_table', $templates, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            $(document).on('change', '.im-filter', function () {
                let $search = $(`.im-search[data-check=${$(this).val()}]`);
                $search.removeClass('hidden').find('input').attr('disabled', false);
                $search.find('select').attr('disabled', false);
                $(this).find(`option[value=${$(this).val()}]`).attr('disabled','disabled');
                $(this).val(null);
            });

            $(document).on('click', '.im-btn-clear', function () {
                let $search = $(`.im-search`);
                $search.addClass('hidden').find('input').attr('disabled', true);
                $search.find('select').attr('disabled', true);
                $('.im-filter').find('option').attr('disabled', false);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });

            $(document).on('click', '.im-btn-search', function () {
                let $form = $(this).closest('form');
                let serialize = $form.serialize();
                let url = $form.attr('action');
                $.ajax({
                    type: 'get',
                    url,
                    data: serialize,
                    success(data) {
                        $('.im-append-ajax').html(data);
                    },
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/template/index.blade.php ENDPATH**/ ?>