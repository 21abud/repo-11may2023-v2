<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar JQuery</title>
   <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.css">
</head>
<body>

<br>
<button class="btn btn-danger btn-hilang">Hilang</button>
<button class="btn btn-success btn-muncul">Muncul</button>
<button class="btn btn-primary btn-toggle">Toggle</button>
<h1>hello</h1>



<!-- jquery -->
    <script src="bootstrap-5.3.0-alpha3-dist/js/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".btn-hilang").click(function(){
                // $("h1").hide(777);
                // $("h1").fadeOut();
                $("h1").slideUp();
            })
            $(".btn-muncul").click(function(){
                $("h1").show();
            })    
            $(".btn-toggle").click(function(){
                // $("h1").toggle();
                $("h1").fadeToggle();
            })
        })
    </script>
</body>
</html>