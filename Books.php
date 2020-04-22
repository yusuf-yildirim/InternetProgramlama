<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/Untitled1.css" rel="stylesheet">
    <link href="css/card.css" rel="stylesheet">
    <link href="css/Books.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/transition.min.js"></script>
    <script src="js/collapse.min.js"></script>
    <script src="js/dropdown.min.js"></script>
    <?php include 'header.php';?>
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
                echo '<a href="http://192.168.1.2:8081/InternetProgramlama/api/bookProcess/get_book.php?bookID='.$bookid.'" ><div class="books"  style="display: block"><h4 class="resize" style="color: white;padding: 0vh;margin: 0vh ;height: 3vh">'.$categoryname.'</h4>
                      <img  src=' . $bookimagepath . '>
                      <div class="resize">
                     
                      <p>'.$bookname.'<br>'.$bookauthor.'<br>'.$bookprice.'tl</p>
                      </div>
                      </div>
                      </a>';
            }
        }
    }
    ?>


</div>
</body>

<script src = "makePage.js"></script>

</html>