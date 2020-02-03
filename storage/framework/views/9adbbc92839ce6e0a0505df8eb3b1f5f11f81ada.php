<?php $__env->startSection('content'); ?>
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập hệ thống</p>

        <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" placeholder="Mật khẩu">
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
            <div class="row" style="margin-top: 10px">
                <!-- /.col -->
                <div class="col-xs-12">
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-block btn-flat">Đăng ký</a>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/auth/login.blade.php ENDPATH**/ ?>