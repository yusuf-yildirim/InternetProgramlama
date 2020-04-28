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