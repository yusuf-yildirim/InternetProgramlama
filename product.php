<?php



if(isset($_GET["bookID"])){
    $curl = curl_init();
    $bookID = $_GET["bookID"];


    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:8081/InternetProgramlama/api/bookProcess/get_book.php?bookID=$bookID" ,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode( $response);

    //echo $response;
}


?>



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="font-awesome.min.css" rel="stylesheet">
    <link href="Untitled1.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
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
    <!-- Insert Google Analytics code here -->
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
<div id="container">
    <?php  foreach ($data->Photos as $var){
        //echo $var;
        echo "<div id=\"bookimage1\" style=\"position:absolute;left:64px;top:221px;width:489px;height:264px;z-index:4;\">  
        <img src=\InternetProgramlama\\".$var." id=\"Image1\" alt=\"\" style=\"border: solid white\"> </div>";
    }
    ?>

    <div id="bookimage2"  style="position:absolute;left:64px;top:498px;width:136px;height:70px;z-index:5;">
        <img src="images/7.jpg" onclick="changeimage(this.id)" id="Image2" alt="" style="border: solid white"></div>
    <div id="bookimage3" style="position:absolute;left:221px;top:497px;width:167px;height:72px;z-index:6;">
        <img src="images/4.jpg" onclick="changeimage(this.id)" id="Image3" alt="" style="border: solid white"></div>
    <div id="bookimage4" style="position:absolute;left:408px;top:496px;width:145px;height:74px;z-index:7;">
        <img src="images/6.jpg" onclick="changeimage(this.id)" id="Image4" alt="" style="border: solid white"></div>



    <div id="bookdesc" style="position:absolute;left:687px;top:307px;width:456px;height:179px;z-index:8;">
        <span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><?php  echo $data->bookDetails; ?> </span>
    </div>
    <div id="bookauthor" style="position:absolute;left:687px;top:555px;width:253px;height:15px;z-index:9;">
        <span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><?php  echo $data->bookAuthor; ?> </span></div>
    <div id="bookname" style="position:absolute;left:687px;top:235px;width:250px;height:33px;z-index:10;">
        <span style="color:#FFFFFF;font-family:Arial;font-size:29px;"> <?php  echo $data->bookName; ?>   </span></div>
    <div id="wb_Text4"
         style="position:absolute;left:23px;top:1011px;width:270px;height:36px;z-index:11;margin-bottom: 500vh">
        <span style="color:#FFFFFF;font-family:Arial;font-size:32px;">Yorumlar</span></div>
    <textarea name="TextArea1" id="TextArea1"
              style="position:absolute;left:262px;top:822px;width:745px;height:90px;z-index:12;" rows="5" cols="91"
              spellcheck="false"></textarea>
    <div id="wb_Text5" style="position:absolute;left:147px;top:863px;width:1061px;height:21px;z-index:13;">
        <span style="color:#FFFFFF;font-family:Arial;font-size:19px;">Yorum yap</span></div>
    <input type="submit" id="Button1" name="" value="Paylaş"
           style="position:absolute;left:894px;top:941px;width:123px;height:30px;z-index:14;">
    <div id="wb_Text6" style="position:absolute;left:64px;top:654px;width:250px;height:27px;z-index:15;">
        <span style="color:#FFFFFF;font-family:Arial;font-size:24px;">Oyla</span></div>
    <div id="star1" onclick="star(this.id)"
         style="position:absolute;left:130px;top:651px;width:33px;height:33px;z-index:16;">
        <img src="images/1024px-Empty_Star.svg.png" id="star1img" alt=""></div>
    <div id="star2" onclick="star(this.id)"
         style="position:absolute;left:163px;top:651px;width:33px;height:33px;z-index:17;">
        <img src="images/1024px-Empty_Star.svg.png" id="star2img" alt=""></div>
    <div id="star3" onclick="star(this.id)"
         style="position:absolute;left:196px;top:651px;width:33px;height:33px;z-index:18;">
        <img src="images/1024px-Empty_Star.svg.png" id="star3img" alt=""></div>
    <div id="star4" onclick="star(this.id)"
         style="position:absolute;left:229px;top:651px;width:33px;height:33px;z-index:19;">
        <img src="images/1024px-Empty_Star.svg.png" id="star4img" alt=""></div>
    <div id="star5" onclick="star(this.id)"
         style="position:absolute;left:260px;top:651px;width:33px;height:33px;z-index:20;">
        <img src="images/1024px-Empty_Star.svg.png" id="star5img" alt=""></div>
</div>

</body>


<script>
    function star(x) {
        if (x == "star1") {
            document.getElementById("star1img").src = "images/fullstar.svg.png";
            document.getElementById("star2img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star3img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star4img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star5img").src = "images/1024px-Empty_Star.svg.png";
        } else if (x == "star2") {
            document.getElementById("star1img").src = "images/fullstar.svg.png";
            document.getElementById("star2img").src = "images/fullstar.svg.png";
            document.getElementById("star3img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star4img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star5img").src = "images/1024px-Empty_Star.svg.png";
        } else if (x == "star3") {
            document.getElementById("star1img").src = "images/fullstar.svg.png";
            document.getElementById("star2img").src = "images/fullstar.svg.png";
            document.getElementById("star3img").src = "images/fullstar.svg.png";
            document.getElementById("star4img").src = "images/1024px-Empty_Star.svg.png";
            document.getElementById("star5img").src = "images/1024px-Empty_Star.svg.png";
        } else if (x == "star4") {
            document.getElementById("star1img").src = "images/fullstar.svg.png";
            document.getElementById("star2img").src = "images/fullstar.svg.png";
            document.getElementById("star3img").src = "images/fullstar.svg.png";
            document.getElementById("star4img").src = "images/fullstar.svg.png";
            document.getElementById("star5img").src = "images/1024px-Empty_Star.svg.png";
        } else if (x == "star5") {
            document.getElementById("star1img").src = "images/fullstar.svg.png";
            document.getElementById("star2img").src = "images/fullstar.svg.png";
            document.getElementById("star3img").src = "images/fullstar.svg.png";
            document.getElementById("star4img").src = "images/fullstar.svg.png";
            document.getElementById("star5img").src = "images/fullstar.svg.png";

        }
    }

    var oldsrc = null;
    function changeimage(x) {
            document.getElementById("Image1").src = document.getElementById(x).src;
            document.getElementById(x).style.border = "solid yellow";
            if(oldsrc != null){
                oldsrc.style.border = "solid white";
            }
            oldsrc = document.getElementById(x);
    }


</script>
</html>