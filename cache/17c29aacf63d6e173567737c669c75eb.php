<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?php echo e($user['role']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./public/css/home.css?v=<?php echo e(rand(1, 20)); ?>">
</head>

<body>


    <div class="app">
        <div class="wrapper">
            <div class="navbar">
                <div class="nb-top">
                    <div class="img-round">
                        <img src="./public/asset/profile.jpg" alt="profile">
                    </div>
                    <div class="user-info">
                        <p><?php echo e($user['full_name']); ?></p>
                        <p>ID#: <?php echo e($user['user_id']); ?></p>
                        <p><?php echo e($user['role']); ?></p>
                    </div>
                </div>
                <div>
                    <?php if($user['role'] == 'user'): ?>
                        <button onclick="switchTab('tab1')">Consult <i class="fas fa-pen-nib"></i></button>
                        <button onclick="switchTab('tab2')">Consultations <i class="fas fa-comment"></i></button>
                    <?php endif; ?>
                    <button>
                        <a href="/logout">Logout</a>
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>

            <?php if($user['role'] == 'admin'): ?>
                <?php echo $__env->make('partials.admin', ['user' => $user, 'apt' => $apt], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
            <?php endif; ?>
            <?php if($user['role'] == 'user'): ?>
                <?php echo $__env->make('partials.user', ['user' => $user, 'fbs' => $fbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
            <?php endif; ?>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $(".con-submit").on("click", function() {
                let formData = $(".ct-form").serialize();

                $.ajax({
                    type: "POST",
                    url: "/submit",
                    data: formData,
                    success: function(response) {
                        //let res = JSON.parse(response);
                        console.log(response);
                    }
                });

            });
        });

        $(document).ready(function() {
            $(".adm-res").on("submit", function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "/response",
                    data: formData,
                    success: function(response) {
                        //let res = JSON.parse(response);
                        console.log(response);
                    }
                });
            });
        });


        function switchTab(tab) {
            let temp = document.querySelector(`.${ tab }`);
            let tabLinks = document.querySelectorAll(".tab");
            tabLinks.forEach(function(link) {
                link.style.display = 'none';
            });
            temp.style.display = 'block';
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\Admin\Desktop\Archnet\views/Home.blade.php ENDPATH**/ ?>