<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./public/css/form.css?v=<?php echo e(rand(1, 20)); ?>">
</head>

<body>

    <div class="con-app">
        <section class="con-form">
            <h2>Login</h2>
            <div class="user-type">
                <label id="user-type">User</label>
                <div class="toggle-switch">
                    <input type="radio" id="user-radio" name="role" value="user" checked>
                    <label for="user-radio">User</label>
                    <input type="radio" id="admin-radio" name="role" value="admin">
                    <label for="admin-radio">Admin</label>
                </div>
            </div>
            <div class="form-div">
                <button class="button" id="signup-btn">
                    <a href=""><i class="fas fa-user-plus"></i> Signup</a>
                </button>
                <button class="button" id="login-btn">
                    <a href=""><i class="fas fa-sign-in-alt"></i> Login</a>
                </button>
            </div>
        </section>
    </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userType = document.getElementById('user-type');
            const signupBtn = document.getElementById('signup-btn').querySelector('a');
            const loginBtn = document.getElementById('login-btn').querySelector('a');

            // Event listener for radio buttons
            document.querySelectorAll('input[name="role"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        userType.textContent = this.value.charAt(0).toUpperCase() + this.value
                            .slice(1);
                        signupBtn.href = `/signup?role=${this.value}`;
                        loginBtn.href = `/login?role=${this.value}`;
                    }
                });
            });

            // Initial call to set initial state
            document.querySelector('input[name="role"]:checked').dispatchEvent(new Event('change'));
        });
    </script>

</body>

</html>
<?php /**PATH C:\Users\Admin\Desktop\codeholic\views/Form.blade.php ENDPATH**/ ?>