<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/Untitled1.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/transition.min.js"></script>
    <script src="js/collapse.min.js"></script>
    <script src="js/dropdown.min.js"></script>
    <?php include 'header.php'; ?>
    <script>
        $(document).ready(function () {
            $("a[href*='#header']").click(function (event) {
                event.preventDefault();
                $('html, body').stop().animate({scrollTop: $('#wb_header').offset().top}, 600, 'easeOutCirc');
            });
            $(document).on('click', '.ThemeableMenu1-navbar-collapse.in', function (e) {
                if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')) {
                    $(this).collapse('hide');
                }
            });
            $(document).on('click', '.ThemeableMenu2-navbar-collapse.in', function (e) {
                if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')) {
                    $(this).collapse('hide');
                }
            });
        });
    </script>
</head>


<body>
<div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="İsim"/>
            <input type="password" placeholder="Şifre"/>
            <input type="text" placeholder="E-posta"/>
            <button>create</button>
            <p class="message">Zaten Kaydoldun mu? <a href="#">Giriş Yap</a></p>
        </form>
        <form id="login_form" class="login_form">
            <input type="email" name="email" placeholder="E-Posta"/>
            <input type="password" name="password" placeholder="Şifre"/>
            <button type="submit">Giriş Yap</button>
            <p class="message">Kaydolmadın mı? <a href="#">Şimdi Kayıt Ol.</a></p>
        </form>
    </div>
</div>

<script>

    $(document).on('submit', '#login_form', function () {

        var login_form = $(this);
        var form_data = JSON.stringify(login_form.serializeObject());

        $.ajax({
            url: "./api/userProcess/login.php",
            type: "POST",
            contentType: 'application/json',
            data: form_data,
            success: function (result) {

                setCookie("jwt", result.jwt, 1);
                $('#response').html("<div class='alert alert-success' style='margin-top: 300px'>Başarıyla Giriş Yapıldı.</div>");
                setTimeout(() => {
                    window.location.replace("./index.php");
                }, 2);


            },
            error: function (xhr, resp, text) {

                login_form.find('input').val('');
            }
        });

        return false;
    });


    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    $.fn.serializeObject = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    $('.message a').click(function () {
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>
