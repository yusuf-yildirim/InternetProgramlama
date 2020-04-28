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


    </head>

<body>
<?php include 'header.php';?>
<div class="maincontent">
    <div class="accountmenu">
        <img class="accout-avatar" src="images/avatar.png" alt="" title="">
        <a href="#">Profil Bilgileri</a>
        <a href="#"  class="active">Siparişler</a>
        <a href="#">Bilgileri Güncelle</a>
        <a href="#">Hesabı Sil</a>
        <a href="#">Çıkış Yap</a>
    </div>
    <div>
       <ul>
           <div class="order-preview">
               <div class="order-head">
                   <div class="cell split">
                       <p>
                           <span class="label">Sipariş Tarihi : </span> 27/04/2020
                       </p>
                       <p>
                           <span class="label">Sipariş Kodu : </span> <span class="orderNumber">202559178977 </span>
                       </p>
                   </div>
                   <div class="cell split">
                       <p>
                           <span class="label">Ödenen Tutar</span>
                       </p>
                       <p>
                           <span class="label">x TL</span>
                       </p>
                   </div>
                   <div class="cell split">
                       <p>
                           <span class="label">Adres</span>
                       </p>
                       <p>
                           <span class="label">Adres Bilgisi</span>
                       </p>
                   </div>
                   <div class="cell">
                       <p>
                           <span class="label">&zwnj;</span>
                       </p>
                       <p>
                           <span class="label"><a href="#">Sipariş Detayları ></a></span>
                       </p>
                   </div>
               </div>

               <table class="order-body">
                   <tbody>

                   <tr class>

                       <td class="cell visual">
                           <a href="#">
                               <img width="120" height="120" src="images/product.png" alt="" >
                           </a>
                       </td>

                       <td class="cell details">
                           <p class="productname"> <a class="name link" href="#">Ürün Adı </a> </p>
                           <p class="quantity">1 Adet</p>
                           <p class="price"><strong>276,99 TL</strong></p>
                       </td>
                       <td class="cell shipping ">
                           <strong class="title">Sipariş Durumu : KARGOLANDI </strong>
                           <p class="cargoName">MNG Kargo</p>
                           <a class="id link" target="_blank" href="#">111111111</a>
                           <a class="btn btnBlack mid" target="_blank" href="#">Kargo Takip</a>
                           <p class="cargoInfo"> Ücretsiz Kargo </p>
                       </td>


                       <td class="cell actions" >
                           <a href="#" class="a_demo_one">
                               İade Et
                           </a>
                       </td>
                   </tr>
                   </tbody>
               </table>
           </div>

       </ul>
    </div>
</div>









</body>

</html>