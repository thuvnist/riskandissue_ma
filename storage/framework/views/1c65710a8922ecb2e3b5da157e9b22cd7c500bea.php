<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="box box-info">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <form action="<?php echo e(route('issues.sample')); ?>" method="get" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="border-round"><i class="fa fa-sort-down"></i><span>Lọc</span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-6">
                                <div class="form-group hidden im-search" data-check="1">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            <?php echo e(\App\Template::LABEL_OPTIONS['name']); ?>

                                            <input disabled name="is_search[name]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="name" class="form-control">
                                            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($template['name']); ?>"><?php echo e($template['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="2">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            <?php echo e(\App\Template::LABEL_OPTIONS['show_user_id']); ?>

                                            <input disabled name="is_search[show_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="show_user_id" class="form-control">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="3">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            <?php echo e(\App\Template::LABEL_OPTIONS['approve_user_id']); ?>

                                            <input disabled name="is_search[approve_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="approve_user_id" class="form-control">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="4">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            <?php echo e(\App\Template::LABEL_OPTIONS['use_user_id']); ?>

                                            <input disabled name="is_search[use_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="use_user_id" class="form-control">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                                <div class="form-group hidden im-search" data-check="5">
                                    <div class="col-lg-4 custom-input-check">
                                        <label class="custom-input-check">
                                            <?php echo e(\App\Template::LABEL_OPTIONS['view_user_id']); ?>

                                            <input disabled name="is_search[view_user_id]" type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <select disabled name="view_user_id" class="form-control">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4"></div>
                                </div>
                            </div>
                            
                        

                        <div class="form-group">
                            <div class="text-right margin-bottom col-md-11">
                                <a href="<?php echo e(route('issues.create_sample')); ?>">
                                    <button type="button" class="btn btn-primary ">Tạo mẫu issue mới</button>
                                </a>
                            </div>
                        </div>
                    </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/issues/sample.blade.php ENDPATH**/ ?>