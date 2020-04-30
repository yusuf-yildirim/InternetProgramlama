<div id="headercontainer">
    <div id="header">
        <div class="row">
            <div class="logo">
                <div id="logoBreadcrumb1" style="display:inline-block;width:100%;z-index:0;vertical-align:top;">
                    <ul id="Breadcrumb1">
                        <li><a href="index.php">KitapEvi</a></li>
                    </ul>

                </div>
            </div>
            <div class="mainnavmenu">
                <div id="Menu" style="display:inline-block;width:100%;z-index:1001;">
                    <div id="navMenu" class="navMenu" style="width:100%;height:auto !important;">
                        <div class="contentcontainer">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="index.php">Anasayfa</a>
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
                        <div class="contentcontainer" >
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href=""><i class="fa fa-shopping-basket"></i> </a>
                                </li>
                                <li id="login" class="">
                                    <a href="./login.php"><i class="fa fa-sign-in"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){

        var jwt = getCookie('jwt');
        $.post("./api/userProcess/validate_token.php", JSON.stringify({jwt: jwt})).done(function (result) {


            var html = `<div class="contentcontainer">
    <ul class="nav navbar-nav">
        <li class="">
            <a href=""><i class="fa fa-shopping-basket"></i> </a>
        </li>
        <li  id="profile" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">` + result.data.firstname + " " +result.data.lastname +`<b
                        class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="./account.php">Profilim</a></li>
                <li><a href="#">Siparişlerim</a></li>
                <li><a onclick= logout() >Çıkış Yap</a></li>
            </ul>
        </li>
    </ul>
</div>`;
            $("#usermenucontent").html(html)


        })
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