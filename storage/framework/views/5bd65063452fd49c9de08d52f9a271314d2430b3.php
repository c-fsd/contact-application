<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="panel-heading">
                    <form action="/create" method="post">
                        <input type="text" name="title" placeholder="Title">
                        <input type="text" name="msg" placeholder="Content">
                        <?php echo e(csrf_field()); ?>

                        <input type="submit" name="submit" value="Add record">
                    </form>
                </div>
                <div class="panel-heading"><h2>List of messages:</h2></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($message->title); ?></td>
                                    <td><?php echo e($message->content); ?></td>
                                    <td><?php echo e($message->created_at->format('d/m/y H:i')); ?></td>
                                <!--  <td><?php echo e($message->created_at->diffForHumans()); ?></td> -->
                                    <td>Edit</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>