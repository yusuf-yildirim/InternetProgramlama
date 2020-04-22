<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/transition.min.js"></script>
    <script src="js/collapse.min.js"></script>
    <script src="js/dropdown.min.js"></script>
    <script src="js/wb.slideshow.min.js"></script>
    <script>
        $(document).ready(function () {
            $("a[href*='#header']").click(function (event) {
                event.preventDefault();
                $('html, body').stop().animate({scrollTop: $('#headercontainer').offset().top}, 600, 'easeOutCirc');
            });
            $(document).on('click', '.navMenu-navbar-collapse.in', function (e) {
                if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')) {
                    $(this).collapse('hide');
                }
            });
            $("#SlideShow1").slideshow(
                {
                    interval: 3500,
                    type: 'sequence',
                    effect: 'css-animation',
                    direction: '',
                    pagination: false,
                    effectlength: 500
                });
            $("#SlideShow1_back a").click(function () {
                $('#SlideShow1').slideshow('previmage');
            });
            $("#SlideShow1_next a").click(function () {
                $('#SlideShow1').slideshow('nextimage');
            });
            $(document).on('click', '.usermenu*-navbar-collapse.in', function (e) {
                if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle')) {
                    $(this).collapse('hide');
                }
            });
            $("#CardContainer1").owlCarousel({
                autoplayTimeout: 5000,
                margin: 15,
                autoplay: false,
                nav: false,
                loop: true,
                dots: true,
                items: 4,
                slideBy: 1
            });
        });
    </script>
    <!-- Insert Google Analytics code here -->
</head>
<body>
<div id="container">
    <div id="SlideShow1" style="position:absolute;left:0px;top:10vh;width:100%;height:60vh;z-index:5;">
        <img class="image" src="images/1.png" alt="" title="">
        <img class="image" src="images/2.jpg" style="display:none;" alt="" title="">
        <img class="image" src="images/3.png" style="display:none;" alt="" title="">
        <img class="image" src="images/4.jpg" style="display:none;" alt="" title="">
        <img class="image" src="images/5.jpg" style="display:none;" alt="" title="">
        <img class="image" src="images/6.jpg" style="display:none;" alt="" title="">
        <img class="image" src="images/7.jpg" style="display:none;" alt="" title="">
        <div id="SlideShow1_back" style="position:absolute;left:4px;top:279px;width:30px;height:30px;z-index:999"><a
                    style="cursor:pointer"><img alt="Back" style="border-style:none" src="images/carousel_back.png"></a>
        </div>
        <div id="SlideShow1_next" style="position:absolute;left:1160px;top:279px;width:30px;height:30px;z-index:999"><a
                    style="cursor:pointer"><img alt="Next" style="border-style:none" src="images/carousel_next.png"></a>
        </div>
    </div>

</div>
<div id="headercontainer">
    <div id="header">
        <div class="row">
            <div class="logo">
                <div id="logoBreadcrumb1" style="display:inline-block;width:100%;z-index:0;vertical-align:top;">
                    <ul id="Breadcrumb1">
                        <li><a href="">KitapEvi</a></li>
                    </ul>

                </div>
            </div>
            <div class="mainnavmenu">
                <div id="Menu" style="display:inline-block;width:100%;z-index:1001;">
                    <div id="navMenu" class="navMenu" style="width:100%;height:auto !important;">
                        <div class="container">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="">Anasayfa</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategoriler<b
                                                class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        include 'config.php';
                                        $queryans = mysqli_query($conn, "SELECT * FROM kategori");
                                        if ($queryans->num_rows > 0) {
                                            while ($row = $queryans->fetch_assoc()) {
                                                $categoryname = $row['KategoriAdi'];
                                                if ($row['KategoriID'] != "" && $row['KategoriID'] != "1") {
                                                    echo '<li><a href="./product.php">' . $categoryname . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="./Books.php">Kitaplar</a>
                                </li>
                                <li class="">
                                    <a href="./index.php#portfolio">Hakkında</a>
                                </li>
                                <li class="">
                                    <a href="./index.php#about">İletişim</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="usermenu">
                <div id="usermenucontainer" style="display:inline-block;width:100%;text-align:center;z-index:1002;">
                    <div id="usermenucontent" class="usermenucontent" style="width:100%;height:auto !important;">
                        <div class="container">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href=""><i class="fa fa-shopping-basket"></i> </a>
                                </li>
                                <li class="">
                                    <a href=""><i class="fa fa-sign-in"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="bestselling" style="position:absolute;left:16%;top:75vh;width:65%;height:auto;z-index:6;">
    <h1 id="Heading1" style="margin-left:5% ">Çok Satanlar</h1>
    <div id="bestsellingcont">
        <?php
        include 'config.php';
        $queryans = mysqli_query($conn, "SELECT * FROM Kitap WHERE KategoriID=1 order by KitapTarih desc limit 4");
        if ($queryans->num_rows > 0) {
            while ($row = $queryans->fetch_assoc()) {

                if ($row['KitapID'] != "") {
                    $bookid = $row['KitapID'];
                    $bookimagepath = mysqli_query($conn, "SELECT * FROM kitapresim WHERE KitapID = $bookid ")->fetch_assoc()['Resim1'];
                    $bookname = $row['KitapAdi'];
                    $bookprice = $row['UrunFiyati'];
                    $authorid = $row['YazarID'];
                    $bookauthor = mysqli_query($conn, "SELECT * FROM yazar WHERE YazarID = $authorid ")->fetch_assoc()['YazarAdi'];
                    echo '<div class="books" style="display: block">
    <img src=' . $bookimagepath . '>
    <div class="resize">
        <p>' . $bookname . '<br>' . $bookauthor . '<br>' . $bookprice . 'tl</p>
    </div>
</div>';
                }
            }
        }
        ?>
    </div>
</div>




<div id="newest" style="position:absolute;left:16%;top:120vh;width:65%;height:auto;z-index:6;">
    <h1 id="Heading2" style="margin-left:5% ">En Yeniler</h1>
    <div id="newestcont">
        <?php
        include 'config.php';
        $queryans = mysqli_query($conn, "SELECT * FROM Kitap order by KitapTarih desc limit 4");
        if ($queryans->num_rows > 0) {
            while ($row = $queryans->fetch_assoc()) {
                if ($row['KitapID'] != "") {
                    $bookid = $row['KitapID'];
                    $bookimagepath = mysqli_query($conn, "SELECT * FROM kitapresim WHERE KitapID = $bookid ")->fetch_assoc()['Resim1'];
                    $bookname = $row['KitapAdi'];
                    $bookprice = $row['UrunFiyati'];
                    $authorid = $row['YazarID'];
                    $bookauthor = mysqli_query($conn, "SELECT * FROM yazar WHERE YazarID = $authorid ")->fetch_assoc()['YazarAdi'];
                    echo '<div class="books" style="display: block">
    <img src=' . $bookimagepath . '>
    <div class="resize">
        <p>' . $bookname . '<br>' . $bookauthor . '<br>' . $bookprice . 'tl</p>
    </div>
</div>';
                }
            }
        }
        ?>
    </div>
</div>
</body>
</html>