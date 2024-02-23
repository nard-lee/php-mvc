<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ $user['role'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./public/css/home.css?v={{ rand(1, 20) }}">
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
                        <p>{{ $user['full_name'] }}</p>
                        <p>ID#: {{ $user['user_id'] }}</p>
                        <p>{{ $user['role'] }}</p>
                    </div>
                </div>
                <div>
                    @if ($user['role'] == 'user')
                        <button onclick="switchTab('tab1')">Consult <i class="fas fa-pen-nib"></i></button>
                        <button onclick="switchTab('tab2')">Consultations <i class="fas fa-comment"></i></button>
                    @endif
                    <button>
                        <a href="/logout">Logout</a>
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>

            @if ($user['role'] == 'admin')
                @include('partials.admin', ['user' => $user, 'apt' => $apt]);
            @endif
            @if ($user['role'] == 'user')
                @include('partials.user', ['user' => $user, 'fbs' => $fbs]);
            @endif

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
