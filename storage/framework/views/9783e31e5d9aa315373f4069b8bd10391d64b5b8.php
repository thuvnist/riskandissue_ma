<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.nav_projects', ['id' => $project->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row im-task-header-child">
        <div class="form-horizontal">
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="label-control" for=""></label>
                            <input style="margin-top: 5px;" class="form-control input-save-inline" data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" value="<?php echo e($task->name); ?>" type="text">
                        </div>
                        <div class="col-md-3">
                            <label class="label-control" for="">Mức ưu tiên</label>
                            <select class="form-control priority-select-save-inline" data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" name="priority" id="">
                                <?php $__currentLoopData = $priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($task->priority == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($priority); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="label-control" for="">Trạng thái</label>
                            <?php if($task->status == 4): ?>
                                <div>
                                    <?php echo e($statuses[4]); ?>

                                </div>
                            <?php elseif($task->status == 3): ?>
                                <div>
                                    <?php echo e($statuses[3]); ?>

                                </div>
                            <?php else: ?>
                                <?php unset($statuses[3]);
                                unset($statuses[4]); ?>
                                <select class="form-control status-select-save-inline" data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" name="status" id="">
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($task->status == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($status); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <p>Thưc hiện bởi
                                <b>
                                    <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($user->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </b>, quan sát bởi
                                <b>
                                    <?php $__currentLoopData = $task->getViewUser(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($user->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </b>, phê duyệt bởi
                                <b>
                                    <?php $__currentLoopData = $task->getApproveUser(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($user->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="" class="form-horizontal">
            <div class="box box-info">
                <div class="box-body">
                    <div class="issue">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="col-md-3">Mô tả</h3>
                                <div class="col-md-9">
                                    <div class="text-right d-flex" style="flex-direction: row-reverse">
                                        <b style="line-height: 100%; margin-left: 10px;">Đã làm được: <?php if(isset($task->worked_time)): ?> <?php echo e(number_format($task->worked_time, 2, ',', ' ')); ?> <?php else: ?> 0 <?php endif; ?> h</b>
                                        <button type="button" class="btn btn-primary btn-start <?php if(isset($task->time_begin)): ?> hidden <?php endif; ?>" data-href="<?php echo e(route('tasks.start')); ?>" data-task-id="<?php echo e($task->id); ?>">Bắt đầu</button>
                                        <button type="button" class="btn btn-danger btn-end <?php if(!isset($task->time_begin)): ?> hidden <?php endif; ?>" data-href="<?php echo e(route('tasks.end')); ?>" data-task-id="<?php echo e($task->id); ?>">Kết thúc</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <?php echo e($task->description); ?>

                            </div>
                        </div>
                    </div>
                    <div class="issue">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Thông tin công việc</h3>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Hoàn thành</label>
                                    <div class="col-md-9">
                                        <select data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" name="percent" class="form-control w-50 percent-select-save-inline">
                                            <?php $__currentLoopData = $percents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $percent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($task->percent == $key): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($percent); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Ngày bắt đầu</label>
                                    <div class="col-md-9">
                                        <?php echo e($task->time_start); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-lg-6 font-weight-bold">
                                Báo cáo hàng ngày
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Ngày kết thúc</label>
                                    <div class="col-md-9">
                                        <?php echo e($task->time_end); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-md-6">
                                <?php ($i = 1); ?>
                                <?php if(!empty($task->info)): ?>
                                    <?php $__currentLoopData = $task->info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <label class="col-md-3">  <?php echo e($i++); ?>.</label>
                                            <div class="col-md-6">
                                                <?php echo e($info['content']); ?>

                                            </div>
                                            <div class="col-md-3">
                                                <?php echo e($info['created_at']); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <div class="row">
                                    <label class="col-md-3" for="content"><?php echo e($i++); ?>.</label>
                                    <div class="col-md-9">
                                        <input id="content" value="" class="get-info-content" type="text"> <i class="fa fa-arrow-up text-success cursor-pointer btn-submit-info" data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" style="font-size: 18px"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-3" for="">Thời gian (h)</label>
                                    <div class="col-md-9">
                                        <?php echo e($task->estimate); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3" for="">Quá hạn</label>
                                    <?php ($dateExpired = $task->getTimeExpired()); ?>
                                    <?php if($dateExpired > 0): ?>
                                        <div class="col-md-9" style="color: red">
                                            <?php echo e(str_replace("+", "", $dateExpired)); ?> ngày
                                        </div>
                                    <?php else: ?>
                                        Chưa quá hạn.
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <label class="col-md-3" for="">Chi phí (VND)</label>
                                    <div class="col-md-9">
                                        <?php echo e($task->cost); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="issue">
                            <div class="row mt-20">
                                <div class="col-md-6">
                                    <button <?php if($task->required_approved_date || $task->status == 3 || $task->percent != 6): ?> disabled <?php endif; ?> data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" type="button" class="btn btn-primary required-approve-btn">Yên cầu phê duyệt kết thúc công việc</button>
                                    <?php if($task->approve_user_ids && in_array(auth()->user()->id, $task->approve_user_ids) && isset($task->required_approved_date)): ?>
                                        <button <?php if($task->status == 4): ?> disabled <?php endif; ?> data-href="<?php echo e(route('tasks.save_inline', $task->id)); ?>" type="button" class="btn btn-primary approve-btn">
                                            Phê duyệt
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
                            <div class="col-lg-12 font-weight-bold">
                                Lịch sử:
                            </div>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#home">Hoạt động</a></li>
                            <li><a data-toggle="pill" href="#menu1">Trao đổi</a></li>
                            <li><a data-toggle="pill" href="#menu2">Tài liệu</a></li>
                            <li><a data-toggle="pill" href="#menu3">Rủi ro</a></li>
                            <li><a data-toggle="pill" href="#menu5">Quan hệ vấn đề phát sinh</a></li>
                            <li><a data-toggle="pill" href="#menu6">Vấn đề phát sinh</a></li>
                        </ul>

                        <div class="tab-content mt-10">
                            <div id="home" class="tab-pane fade in active">
                            <?php for($i = 1; $i <=3; $i++): ?> <div class="m-10">
                            <div data-toggle="collapse" data-target="#demo<?php echo e($i); ?>">
                                <div style="display: inline-flex" class="mt-10">
                                    <div class="boder-number"><?php echo e($i); ?></div> 15:10, 25/07/2019, by:<span class="font-weight-bold"> Lê Hải Long</span><span><i class="fa fa-check-circle text-success"></i></span>
                                </div>
                            </div>
                            <div id="demo<?php echo e($i); ?>" class="collapse">
                                <p>Em nộp tài liệu tham khảo ạ</p>
                                <div class="row">
                                    <div class="col-lg-offset-2 col-lg-8">
                                        <p>Sau 2 ngày: <b>Lý Minh Hà</b><i class="fa fa-check-circle text-success"></i></p>
                                        <p>Sau 10 phút: <b>Trần Hải Nam</b></p>
                                        <div class="col-lg-offset-1 col-lg-8">
                                            <p>Chú làm chưa được chuẩn</p>
                                            <p>Tài liệu sai chủ đề</p>
                                            <p>Trong ngày mai gửi lại nhé</p>
                                        </div>
                                        <div class="form-inline">
                                            <input class="form-control w-50" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php endfor; ?>
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <div class="boder-number">4</div> 15:10, 25/07/2019, by: <b>Lê Hải Long</b><button dissabled class="ml-5 btn btn-primary">Đạt</button><button class="ml-5 btn btn-primary">Chưa đạt</button>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <p>Em nộp tài liệu tham khảo ạ</p>
                                    <div class="row">
                                        <div class="col-lg-offset-2 col-lg-8">
                                            <p>Sau 2 ngày: <b>Lý Minh Hà</b> <i class="fa fa-check-circle text-success"></i></p>
                                            <p>Sau 10 phút: <b>Trần Hải Nam</b></p>
                                            <div class="col-lg-offset-1 col-lg-8">
                                                <p>Chú làm chưa được chuẩn</p>
                                                <p>Tài liệu sai chủ đề</p>
                                                <p>Trong ngày mai gửi lại nhé</p>
                                            </div>
                                            <div class="form-inline col-lg-offset-1 col-lg-8">
                                                <input class="form-control w-50" style="margin-right: 10px" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-10">
                                <div class="col-lg-12">
                                    <button class="btn btn-primary">Thêm mới hoạt động</button>
                                </div>
                                <div class="col-lg-12 mt-10">
                                    <textarea class="form-control" name="editor1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Trao đổi</h3>
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <span style="font-size: 12px">(20/11/2019 10:30)</span>
                                        <b>Lê Hải Long</b>: cần sửa lại nhiều
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="form-inline col-lg-12">
                                            <input class="form-control" style="margin-right: 10px" placeholder="nhập comment"><a href="" class="btn btn-success">Gửi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Tài liệu</h3>
                            <div class="m-10">
                                <div>
                                    <div style="display: inline-flex" class="mt-10">
                                        <span>25/07/2019 15:10</span>
                                        Tài liệu thiết kế database , by: <b>Lê Hải Long</b> <a href="" class="text-primary" style="margin-left: 10px">tải xuống</a>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-inline">
                                                <input type="text" class="form-control" style="margin-right: 10px">
                                                <input type="file" class="form-control" style="margin-right: 10px">
                                                <a href="" class="btn btn-primary">Gửi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="menu3" class="tab-pane fade">
                            <h3>Rủi ro</h3>
                            <div class="box-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Loại</th>
                                        <th>Mô tả</th>
                                        <th>Mức độ nghiêm trọng</th>
                                        <th>Xu hướng</th>
                                        <th>Trạng thái</th>
                                        <th>Người phòng ngừa</th>
                                        <th>Hành động</th>
                                    </tr>
                                    <?php if(!empty($task->risks)): ?>
                                        <?php ($j = 0); ?>
                                        <?php $__currentLoopData = $task->risks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>">
                                                    <a href="<?php echo e(route('tasks.risks.detail', [$task->id, $key])); ?>"><?php echo e(isset($value['title']) ? $value['title'] : ''); ?></a>
                                                </td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['type']) ? \App\Issue::RISK_TYPE[$value['type']] : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['desc']) ? $value['desc'] : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['danger']) ? \App\Issue::RISK_DANGER[$value['danger']] : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['feature']) ? \App\Issue::RISK_FEATURE[$value['feature']] : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['status']) ? \App\Issue::RISK_STATUS[$value['status']] : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>"><?php echo e(isset($value['user_id']) ? \App\User::getNameFromId($value['user_id']) : ''); ?></td>
                                                <td class="<?php echo e(isset($value['type']) ? \App\Issue::COLOR_CLASS[$value['type']] : 'bg-board'); ?>">
                                                    <div class="d-flex">
                                                        <button  class="risk-delete btn btn-danger" data-risk="<?php echo e($key); ?>" type="button" ><i class="fa fa-trash"></i></button>
                                                        <button type="button" data-risk="<?php echo e($key); ?>" data-task = "<?php echo e($task->id); ?>" data-href="<?php echo e(route('tasks.risks.defend')); ?>" class="btn btn-primary ml-5 js-btn-risk js-btn-risk-defend">Phòng ngừa</button>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </table>
                                <div class="mt-20">
                                    <button type="button" data-href="<?php echo e(route('tasks.risks.create', $task->id)); ?>" class="btn btn-primary create-risk">Thêm mới rủi ro</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">

                            <div class="box-body">
                                <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <div class="bg-div bg-1" data-toggle="collapse" data-target="#<?php echo e($issue->id); ?>">
                                            <span>
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">
                                                    <?php echo e($issue->title); ?>

                                                </a>
                                                - Trạng thái: <span class="<?php echo e($issue->getColorClass()); ?>" style="padding: 2px"><?php echo e($issue->status_name); ?></span>
                                                - người tạo: <?php echo e($issue->created_by_name); ?> - loại: <?php echo e(\App\Issue::TYPE[$issue->type]); ?>

                                                 - ngày bắt đầu: <?php echo e($issue->start_date); ?> - ngày kết thúc: <?php echo e($issue->end_date); ?>

                                            </span><br>
                                            <span class="bg-success" style="padding: 2px"><?php echo e($issue->description); ?></span>
                                        </div>
                                        <div id="<?php echo e($issue->id); ?>" class="collapse" style="margin-left: 40px">
                                            <div>
                                                <div class="bg-div bg-warning"
                                                     data-toggle="collapse"
                                                     data-target="#<?php echo e($issue->id); ?>require">
                                                    <span>Phụ thuộc</span>
                                                </div>

                                                <div id="<?php echo e($issue->id); ?>require" class="collapse" style="margin-left: 40px">
                                                    <?php ($is = $issue->requireIssue()); ?>
                                                    <?php if($is): ?>
                                                        <div>
                                                            <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="<?php echo e($is->color_name); ?>" style="padding: 2px"><?php echo e($is->status_name); ?></span> <?php echo e($is->title); ?>

                                                            </span>
                                                                - Trạng thái: <span class="<?php echo e($is->color_name); ?>" style="padding: 2px"><?php echo e($is->status_name); ?></span>
                                                                - người tạo: <?php echo e($is->created_by_name); ?> - loại: <?php echo e(\App\Issue::TYPE[$is->type]); ?>

                                                                - ngày bắt đầu: <?php echo e($is->start_date); ?> - ngày kết thúc: <?php echo e($is->end_date); ?>

                                                                <br>
                                                                <span class="bg-success" style="padding: 2px"><?php echo e($is->description); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-danger"
                                                     data-toggle="collapse"
                                                     data-target="#<?php echo e($issue->id); ?>subordinate">
                                                    <span>Khóa</span>
                                                </div>

                                                <div id="<?php echo e($issue->id); ?>subordinate" class="collapse" style="margin-left: 40px">
                                                    <?php ($subordinates = $issue->subordinateIssue()); ?>
                                                    <?php if($subordinates): ?>
                                                        <?php $__currentLoopData = $subordinates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subordinate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                <?php echo e($subordinate->title); ?>

                                                            </span>
                                                                    - Trạng thái: <span class="<?php echo e($subordinate->color_name); ?>" style="padding: 2px">
                                                                    <?php echo e($subordinate->status_name); ?>

                                                                </span>
                                                                    - người tạo: <?php echo e($subordinate->created_by_name); ?> - loại: <?php echo e(\App\Issue::TYPE[$subordinate->type]); ?>

                                                                    - ngày bắt đầu: <?php echo e($subordinate->start_date); ?> - ngày kết thúc: <?php echo e($subordinate->end_date); ?><br>
                                                                    <span class="bg-success" style="padding: 2px"><?php echo e($subordinate->description); ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-primary"
                                                     data-toggle="collapse"
                                                     data-target="#<?php echo e($issue->id); ?>relative">
                                                    <span>Liên quan</span>
                                                </div>

                                                <div id="<?php echo e($issue->id); ?>relative" class="collapse" style="margin-left: 40px">
                                                    <?php ($subordinates = $issue->relativeIssue()); ?>
                                                    <?php if($subordinates): ?>
                                                        <?php $__currentLoopData = $subordinates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subordinate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="<?php echo e($subordinate->color_name); ?>" style="padding: 2px">
                                                                    <?php echo e($subordinate->status_name); ?>

                                                                </span>
                                                                <?php echo e($subordinate->title); ?>

                                                            </span>
                                                                    - Trạng thái: <span class="<?php echo e($subordinate->color_name); ?>" style="padding: 2px">
                                                                    <?php echo e($subordinate->status_name); ?>

                                                                </span>
                                                                    - người tạo: <?php echo e($subordinate->created_by_name); ?> - loại: <?php echo e(\App\Issue::TYPE[$subordinate->type]); ?>

                                                                    - ngày bắt đầu: <?php echo e($subordinate->start_date); ?> - ngày kết thúc: <?php echo e($subordinate->end_date); ?>

                                                                    <br>
                                                                    <span class="bg-success" style="padding: 2px"><?php echo e($subordinate->description); ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="bg-div bg-success"
                                                     data-toggle="collapse"
                                                     data-target="#<?php echo e($issue->id); ?>similar">
                                                    <span>Tương tự</span>
                                                </div>

                                                <div id="<?php echo e($issue->id); ?>similar" class="collapse" style="margin-left: 40px">
                                                    <?php ($subordinates = $issue->similarIssue()); ?>
                                                    <?php if($subordinates): ?>
                                                        <?php $__currentLoopData = $subordinates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subordinate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <div class="bg-div bg-1">
                                                            <span>
                                                                <span class="<?php echo e($subordinate->color_name); ?>" style="padding: 2px">
                                                                    <?php echo e($subordinate->status_name); ?>

                                                                </span>
                                                                <?php echo e($subordinate->title); ?>

                                                            </span>
                                                                    - Trạng thái: <span class="<?php echo e($subordinate->color_name); ?>" style="padding: 2px">
                                                                    <?php echo e($subordinate->status_name); ?>

                                                                </span>
                                                                    - người tạo: <?php echo e($subordinate->created_by_name); ?> - loại: <?php echo e(\App\Issue::TYPE[$subordinate->type]); ?>

                                                                    - ngày bắt đầu: <?php echo e($subordinate->start_date); ?> - ngày kết thúc: <?php echo e($subordinate->end_date); ?>

                                                                    <br>
                                                                    <span class="bg-success" style="padding: 2px"><?php echo e($subordinate->description); ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="mt-20">
                                    <button type="button" data-href="<?php echo e(route('tasks.issues.create', $task->id)); ?>" class="btn btn-primary create-issue">Tạo issue</button>
                                </div>
                            </div>
                        </div>
                        <div id="menu6" class="tab-pane fade">

                            <div class="box-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Trạng thái</th>
                                        <th>Loại vấn đề phát sinh</th>
                                        <th>Mô tả</th>
                                        <th>Người phụ trách</th>
                                        <th>Vấn đề phát sinh con</th>
                                        <th>Chú thích</th>
                                        <th>Hành động</th>
                                    </tr>
                                    <?php $__currentLoopData = $task->issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="<?php echo e($issue->getColorClass()); ?>">
                                                <a href="<?php echo e(route('issues.detail', $issue->id)); ?>">
                                                    <?php echo e($issue->title); ?>

                                                </a>
                                            </td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e($issue->getStatusNameAttribute()); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e($issue->getTypeLabel()); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e($issue->description); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e(isset($issue->user) ? $issue->user->name : ''); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e($issue->getChildIssue()); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>"><?php echo e($issue->note); ?></td>
                                            <td class="<?php echo e($issue->getColorClass()); ?>">
                                                <div class="d-flex">
                                                    <a class="btn btn-primary" href="<?php echo e(route('tasks.issues.edit', [$task->id, $issue->id])); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger ml-5 issue-delete" data-issue="<?php echo e($issue->id); ?>" type="button" ><i class="fa fa-trash"></i></button>
                                                    <?php if(isset($issue->end_date)): ?>
                                                        <?php if($issue->end_date < now()): ?>
                                                            <button type="button" data-issue="<?php echo e($issue->id); ?>" data-task = "<?php echo e($task->id); ?>" data-href="<?php echo e(route('tasks.issues.defend')); ?>" class="btn btn-primary ml-5 js-btn-risk js-btn-issue-defend">Phòng ngừa</button>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                <div class="mt-20">
                                    <button type="button" data-href="<?php echo e(route('tasks.issues.create', $task->id)); ?>" class="btn btn-primary create-issue">Tạo vấn đề </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <form class="form-delete-risk" action="<?php echo e(route('tasks.risks.delete', [$task->id])); ?>" method="post">
        <?php echo method_field('delete'); ?>
        <?php echo csrf_field(); ?>
        <input type="hidden" class="risk-input" name="risk_key" value="">
    </form>
    <form class="form-delete-issue" action="<?php echo e(route('tasks.issues.delete', [$task->id])); ?>" method="post">
        <?php echo method_field('delete'); ?>
        <?php echo csrf_field(); ?>
        <input type="hidden" class="issue-input" name="issue_id" value="">
    </form>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="col-md-4">
                </div>
                <h4 class="modal-title col-md-4 text-center">Chiến lược phòng ngừa rủi ro</h4>
                <div class="text-right col-md-4">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div id="myModalShow" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });
    $(document).on('click', '.risk-delete', function() {
        $('.risk-input').val($(this).data('risk'));
        $('.form-delete-risk').submit();
    });
    $(document).on('click', '.issue-delete', function() {
        $('.issue-input').val($(this).data('issue'));
        $('.form-delete-issue').submit();
    });
    $(document).on('click', '.btn-create-defend', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
            },
        });
    });
    //Pop up create issue and create risk
    $(document).on('click', '.create-risk', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
            },
        });

    });
    $(document).on('click', '.create-issue', function() {
        let url = $(this).data('href');
        $.ajax({
            type: 'get',
            url,
            success(data) {
                let $modal = $('#myModalShow');
                $modal.find('.modal-body').html('').append(data);
                $modal.modal('show');
                $('.js-multiple').select2();
                $('.select2-container').css('width', '100%');
            },
        });

    });
    $(document).on('click', '.js-btn-risk-defend', function() {
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task'),
            'risk' : $(this).data('risk')
        };
        $.ajax({
            type: 'post',
            url,
            data: data,
            success(data) {
                $('#myModal').find('.modal-body').html(data);
                $('#myModal').modal('show');
            },
        });
    });
    $(document).on('click', '.js-btn-issue-defend', function() {
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task'),
            'issue_id' : $(this).data('issue')
        };
        $.ajax({
            type: 'post',
            url,
            data: data,
            success(data) {
                $('#myModal').find('.modal-body').html(data);
                $('#myModal').modal('show')
            },
        });
    });
    $(document).on('click', '.btn-start', function() {
        $(this).addClass('hidden');
        $('.btn-end').removeClass('hidden');
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task-id'),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                console.log(data);
            },
        });
    });
    $(document).on('click', '.btn-end', function() {
        $('.btn-end').addClass('hidden');
        $('.btn-start').removeClass('hidden');
        let url = $(this).data('href');
        let data = {
            'task_id' : $(this).data('task-id'),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                window.location.replace(data);
            },
        });
    });
    $(document).on('keyup', '.input-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            name : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });
    $(document).on('change', '.priority-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            priority : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });
    $(document).on('change', '.status-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            status : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('change', '.percent-select-save-inline', function () {
        let url = $(this).data('href');
        let data = {
            percent : $(this).val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.required-approve-btn', function () {
        $(this).prop('disabled', true);
        let url = $(this).data('href');
        let data = {
            required_approve : 1,
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.approve-btn', function () {
        $(this).prop('disabled', true);
        let url = $(this).data('href');
        let data = {
            approve : 1,
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

    $(document).on('click', '.btn-submit-info', function() {
        let url = $(this).data('href');
        let data = {
            info : $('#content').val(),
        };
        $.ajax({
            type: 'put',
            url,
            data: data,
            success(data) {
                if (data) {
                    window.location.replace(data);
                }
            },
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\issue-management\resources\views/projects/task/detail.blade.php ENDPATH**/ ?>