<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/account.css" rel="stylesheet">
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/transition.min.js"></script>
    <script src="js/collapse.min.js"></script>
    <script src="js/dropdown.min.js"></script>
    <script src="js/wb.slideshow.min.js"></script>

    <script>
        var jwt = getCookie('jwt');
        $.post("./api/userProcess/validate_token.php", JSON.stringify({jwt: jwt})).fail(function (result) {

            window.location.replace("./login.php");
        });

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }

                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

    </script>
</head>
<?php
$data = array("jwt" => $_COOKIE['jwt']);
$data_string = json_encode($data);

$ch = curl_init('http://InternetProgramlama/api/userProcess/validate_token');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
curl_close($ch);
$data = json_decode($result);

?>
<body>
<?php include 'header.php'; ?>
<div class="maincontent">
    <div class="accountmenu">
        <img class="accout-avatar" src="images/avatar.png" alt="" title="">
        <?php
        echo '<h2>' . $data->data->firstname . " " . $data->data->lastname . '</h2>';

        ?>
        <a href="#">Profil Bilgileri</a>
        <a href="#" class="active">Siparişler</a>
        <a href="#">Bilgileri Güncelle</a>
        <a href="#">Hesabı Sil</a>
        <a href="#" onclick= logout()>Çıkış Yap</a>
    </div>
    <div>
        <h1 class="inline-title"> ♪ SİPARİŞLER ♪ </h1>
        <ul>
            <?php
            $accountid = $data->data->id;
            include 'config.php';
            $queryans = mysqli_query($conn, "SELECT * FROM onlinekitapevi_db.siparis WHERE UyeID = $accountid");

            if ($queryans->num_rows > 0) {
                while ($row = $queryans->fetch_assoc()) {
                    $orderstatus = $row['SiparisDurum'];
                    $orderprice = $row['SiparisFiyat'];
                    $orderdate = $row['SiparisTarih'];
                    $orderedproduct = $row['SiparisBilgileri'];
                    $orderID = $row['SiparisID'];

                    $adress = mysqli_query($conn, "SELECT * FROM onlinekitapevi_db.uyeadres WHERE UyeID = $accountid");
                    $adressrow = $adress->fetch_assoc();
                    $addressstring = $adressrow['AdresMetni'] . " " . $adressrow['AdresSehir'] . " " . $adressrow['AdresIlce'] . " " . $adressrow['AdresPK'];

                    $product = mysqli_query($conn, "SELECT * FROM onlinekitapevi_db.kitap WHERE KitapID = $orderedproduct");
                    $productrow = $product->fetch_assoc();
                    $productname = $productrow['KitapAdi'];

                    $productimage = mysqli_query($conn, "SELECT * FROM onlinekitapevi_db.kitapresim WHERE KitapID = $orderedproduct");
                    $productrow = $productimage->fetch_assoc();
                    $productimagedir = $productrow['Resim1'];


                    echo " <div class=\"order-preview\">
                <div class=\"order-head\">
                    <div class=\"cell split\">
                        <p>
                            <span class=\"label\">Sipariş Tarihi : </span> " . $orderdate . "
                        </p>
                        <p>
                            <span class=\"label\">Sipariş Kodu : </span> <span class=\"orderNumber\">" . $orderID . " </span>
                        </p>
                    </div>
                    <div class=\"cell split\">
                        <p>
                            <span class=\"label\">Ödenen Tutar</span>
                        </p>
                        <p>
                            <span class=\"label\">" . $orderprice . " TL</span>
                        </p>
                    </div>
                    <div class=\"cell split\">
                        <p>
                            <span class=\"label\">Adres</span>
                        </p>
                        <p>
                            <span class=\"label\">" . $addressstring . " </span>
                        </p>
                    </div>
                    <div class=\"cell\">
                        <p>
                            <span class=\"label\">&zwnj;</span>
                        </p>
                        <p>
                            <span class=\"label\"><a href=\"#\">Sipariş Detayları ></a></span>
                        </p>
                    </div>
                </div>

                <table class=\"order-body\">
                    <tbody>

                    <tr class>

                        <td class=\"cell visual\">
                            <a href=\"#\">
                                <img width=\"120\" height=\"120\" src=" . $productimagedir . " alt=\"\">
                            </a>
                        </td>

                        <td class=\"cell details\">
                            <p class=\"productname\"><a class=\"name link\" href=\"#\">" . $productname . "</a></p>
                            <p class=\"quantity\">1 Adet</p>
                            <p class=\"price\"><strong>" . $orderprice . " TL</strong></p>
                        </td>
                        <td class=\"cell shipping \">
                            <strong class=\"title\">Sipariş Durumu : " . $orderstatus . " </strong>
                            <p class=\"cargoName\">MNG Kargo</p>
                            <a class=\"id link\" target=\"_blank\" href=\"#\">111111111</a>
                            <a class=\"btn btnBlack mid\" target=\"_blank\" href=\"#\">Kargo Takip</a>
                            <p class=\"cargoInfo\"> Ücretsiz Kargo </p>
                        </td>


                        <td class=\"cell actions\">
                            <a href=\"#\" class=\"a_demo_one\">
                                İade Et
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>";

                }
            }
            ?>
            <div class="wrapper">
                <div class="divider div-transparent div-dot"></div>
            </div>

        </ul>
    </div>
</div>
</body>

<script>
    function logout() {

        setCookie("jwt", "", 1);
        location.reload();
    }


    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

</script>
</html>