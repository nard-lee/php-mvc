<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | <?php echo e($role); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="./public/css/fstyle.css?v=3">
</head>

<body>

    <div class="con-form">
        <form class="signup-form" method="POST">
            <label class="lg-h2">Signup - <?php echo e($role); ?></label>
            <br>
            <br>
            <input name="role" type="text" value="<?php echo e($role); ?>" style="display: none" required>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="full_name" type="text" placeholder="Full Name">
            </div>
            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input name="contact" type="text" placeholder="Contact" required>
            </div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="username" type="text" placeholder="Username" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Password" required>
            </div>
            <div class="error-msg" id="error-msg"></div>
            <button type="submit" class="signup-btn">Signup</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="./public/js/main.js"></script>

</body>

</html>
<?php /**PATH C:\Users\Admin\Desktop\Archnet\views/Signup.blade.php ENDPATH**/ ?>