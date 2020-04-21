<?php


class book
{
    private $conn;
    private $table_name = "kitap";
    // object properties
    public $bookID;
    private $bookName;
    private $bookDetail;
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
    }


    function getBookName(){
        return $this->bookName;
    }

    function getBookDetail(){
        return $this->bookDetail;
    }




}