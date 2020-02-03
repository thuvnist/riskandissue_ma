<?php $__env->startSection('content'); ?>
    <div class="login-box-body">
        <p class="login-box-msg">Đăng ký hệ thống</p>
        <form action="<?php echo e(route('register')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email" required>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="code" value="<?php echo e(old('code')); ?>" class="form-control" placeholder="Mã số sinh viên" required>
                <?php if($errors->has('code')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('code')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" placeholder="Mật khẩu" required>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" value="<?php echo e(old('password')); ?>" required class="form-control" placeholder="Nhập lại mật khẩu">
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Xác nhận</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/auth/register.blade.php ENDPATH**/ ?>