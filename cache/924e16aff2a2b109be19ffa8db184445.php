<div>
    <div class="apt-list">
        <?php if($apt == 'No records found.'): ?>
            <h3 style="text-align: center;color: #ccc">No entries</h3>
        <?php else: ?>
            <?php $__currentLoopData = $apt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="user-wrapper">
                    <div class="user-header">
                        <div class="rounded-sm">
                            <img src="./public/asset/profile.jpg" alt="profile" width="60">
                        </div>
                        <p><?php echo e($item['full_name']); ?></p>
                    </div>
                    <div class="user-msg">
                        <p><?php echo e($item['topic']); ?></p>
                    </div>
                    <div class="c_date">
                        <?php
                            $date = date_create($item['date']);
                            $day = date_format($date, 'd');
                            $month = date_format($date, 'F');
                        ?>
                        <p><?php echo e($day); ?> <?php echo e($month); ?> <?php echo e($item['time']); ?></p>
                    </div>
                    <div class="user-response">
                        <form class="adm-res" method="POST">
                            <input name="apt_id" type="text" value="<?php echo e($item['apt_id']); ?>" style="display: none;">
                            <input name="teach_id" type="text" value="<?php echo e($user['user_id']); ?>" style="display: none;">
                            <input name="respond" type="text" placeholder="response">
                            <select name="status">
                                <option value="0">reject</option>
                                <option value="1">accept</option>
                            </select>
                            <button>respond</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\Admin\Desktop\codeholic\views/partials/admin.blade.php ENDPATH**/ ?>