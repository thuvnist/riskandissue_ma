<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/skin-blue.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('include/css/bootstrap-datepicker.min.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="<?php echo e(route('home')); ?>" class="logo">
            <span class="logo-lg">Manager</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="<?php echo e(route('home')); ?>" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/manager.jpg" class="user-image" alt="">
                            <span class="hidden-xs"><?php echo e(auth()->user()->name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/img/manager.jpg" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo e(auth()->user()->name); ?>

                                </p>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/manager.jpg" class="img-circle" alt="">
                </div>
                <div class="pull-left info">
                    <p><?php echo e(auth()->user()->name); ?></p>
                </div>
            </div>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="<?php echo e(in_array(request()->route()->getName(),['projects.index', 'projects.issues_create', 'projects.board']) ? 'active' : ''); ?>"><a href="<?php echo e(route('projects.index')); ?>"><i class="fa fa-link"></i> <span>Quản lý dự án</span></a></li>
                <li class="treeview <?php echo e(in_array(request()->route()->getName(),['templates.index', 'templates.create']) ? 'active menu-open' : ''); ?>">
                    <a href="#"><i class="fa fa-link"></i> <span>Quản lý mẫu vấn đề phát sinh</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo e(request()->route()->getName() == 'templates.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('templates.index')); ?>">Danh sách mẫu</a></li>
                        <li class="<?php echo e(request()->route()->getName() == 'templates.create' ? 'active' : ''); ?>"><a href="<?php echo e(route('templates.create')); ?>">Tạo mẫu</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <section class="container-fluid">
            <div class="row">
                <?php echo $__env->yieldContent('nav'); ?>
            </div>
        </section>
        <section class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Trung tâm tiếng anh Ammester
        </div>
        <strong>English Center &copy; 1997<a href="#">Company</a>.</strong> Welcome
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading"><?php echo e(auth()->user()->name); ?></h3>
            </div>
            <div class="tab-pane pl-15" id="control-sidebar-settings-tab">
                <a class="control-sidebar-heading" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                      style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo e(asset('include/js/jquery.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo e(asset('include/js/bootstrap.min.js')); ?>"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="<?php echo e(asset('include/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('include/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('js/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/utils.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('.js-multiple').select2();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
<?php /**PATH C:\xampp\htdocs\issue-management-20200111T033215Z-001\issue-management\resources\views/layouts/app.blade.php ENDPATH**/ ?>