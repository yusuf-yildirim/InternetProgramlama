<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="font-awesome.min.css" rel="stylesheet">
    <link href="Untitled1.css" rel="stylesheet">
    <link href="card.css" rel="stylesheet">
    <link href="Books.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet">

    <script src="jquery-1.12.4.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="transition.min.js"></script>
    <script src="collapse.min.js"></script>
    <script src="dropdown.min.js"></script>
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


<div id="content">
    <?php
    include 'config.php';
    $queryans = mysqli_query($conn, "SELECT * FROM Kitap order by KitapTarih desc ");
    if ($queryans->num_rows > 0) {
        while ($row = $queryans->fetch_assoc()) {

            if ($row['KitapID'] != "") {
                $bookid = $row['KitapID'];
                $bookimagepath = mysqli_query($conn, "SELECT * FROM kitapresim WHERE KitapID = $bookid ")->fetch_assoc()['Resim1'];
                $bookname = $row['KitapAdi'];
                $bookprice= $row['UrunFiyati'];
                $authorid = $row['YazarID'];
                $categoryID = $row['KategoriID'];
                $bookauthor= mysqli_query($conn, "SELECT * FROM yazar WHERE YazarID = $authorid ")->fetch_assoc()['YazarAdi'];
                $categoryname= mysqli_query($conn, "SELECT * FROM kategori WHERE KategoriID = $categoryID")->fetch_assoc()['KategoriAdi'];
                if($categoryname == "BestSelling"){
                    $categoryname = "denemekategori";
                }
                echo '<div onClick = "reply_click(this.id)" class="books" id="'.$bookid.'" style="display: block"><h4 class="resize" style="color: white;padding: 0vh;margin: 0vh ;height: 3vh">'.$categoryname.'</h4>
                      <img src=' . $bookimagepath . '>
                      <div class="resize">
                      <p>'.$bookname.'<br>'.$bookauthor.'<br>'.$bookprice.'tl</p>
                      </div>
                      </div>';
            }
        }
    }
    ?>


</div>
</body>

<script src = "makePage.js"></script>

</html>