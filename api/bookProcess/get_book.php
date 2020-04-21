<?php

include_once 'config/database.php';
// instantiate user object
include_once 'objects/book.php';
$database = new Database();
$db = $database->getConnection();
$book = new \book($db);



if(isset($_GET["bookID"])){

    $book->bookID = $_GET["bookID"];
    $book->loadBookInfos();
    $user_arr=array(
        "bookName" =>$book->getBookName(),
        "bookDetails" => $book->getBookDetail(),
        "bookAuthor" => $book->getAuthorName(),
        "bookPrice" => $book->getBookPrice(),
        "bookCategory" => $book->getBookCategory(),
        "bookDate" => $book->getBookDate(),
        "Photos"   => $book->getBookImages()

    );


    print_r(json_encode($user_arr));

}
