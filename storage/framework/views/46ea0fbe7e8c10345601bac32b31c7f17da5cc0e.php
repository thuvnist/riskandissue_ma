<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập hệ thống</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/skin-blue.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/bootstrap-datepicker.min.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>Risk and Issue Management</b></a>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="<?php echo e(asset('include/js/jquery.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo e(asset('include/js/bootstrap.min.js')); ?>"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="<?php echo e(asset('include/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('include/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\issue-management\resources\views/layouts/auth.blade.php ENDPATH**/ ?>