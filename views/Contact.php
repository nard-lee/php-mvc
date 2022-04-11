<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    
    <h1>Hello world</h1>

    <a href="about">about</a>

    <form class="form" method="POST">
        <input type="text" name="username">
        <input type="number" name="cnumber">
        <input name="input" type="submit">
    </form>


    <script>

        $(".form").submit(function(event){

            event.preventDefault();
            let values = $(this).serialize();

            $.ajax({
                url: "/mvc/login",
                type: "POST",
                data: values ,
                success: function (response) {
                    //let r = JSON.parse(response);
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });

    </script>

</body>
</html>