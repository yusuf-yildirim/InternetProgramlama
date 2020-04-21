<?php


class book
{
    private $conn;
    private $table_name = "kitap";
    // object properties
    public $bookID;
    private $bookName;
    private $bookDetail;
    private $bookAuthorID;
    private $bookPrice;
    private $bookDate;
    private $bookCategoryID;




    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function loadBookInfos(){
        $query = "SELECT *
        FROM
            " . $this->table_name . " 
        WHERE
            KitapID='".$this->bookID."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->bookName = $result['KitapAdi'];
        $this->bookDetail = $result['KitapAciklama'];
        $this->bookAuthorID = $result['YazarID'];
        $this->bookPrice = $result['UrunFiyati'];
        $this->bookDate = $result['KitapTarih'];
        $this->bookCategoryID = $result['KategoriID'];
    }

    function getAuthorName(){
        $query = "SELECT *  FROM yazar  WHERE  YazarID='".$this->bookAuthorID."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['YazarAdi'];
    }
    function getBookCategory(){
        $query = "SELECT *  FROM kategori  WHERE  KategoriID='".$this->bookCategoryID."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['KategoriAdi'];
    }

    function getBookName(){
        return $this->bookName;
    }


    function getBookPrice(){
        return $this->bookPrice;
    }

    function getBookDetail(){
        return $this->bookDetail;
    }
    function getBookDate(){
        return $this->bookDate;
    }

    function getBookImages(){
        $query = "SELECT *  FROM kitapresim  WHERE  KitapID='".$this->bookID."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $arr = array();
        if(isset($result["Resim1"])){
            array_push($arr,$result["Resim1"]);
        }
        if(isset($result["Resim2"])){
            array_push($arr,$result["Resim2"]);
        }
        if(isset($result["Resim3"])){
            array_push($arr,$result["Resim3"]);
        }
        if(isset($result["Resim4"])){
            array_push($arr,$result["Resim4"]);
        }
        return $arr;
    }



}