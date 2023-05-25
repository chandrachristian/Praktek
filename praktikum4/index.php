<?php

echo "Hello World";
echo "<br>";
print("Chandra Christian");


echo "Hello", " ", "World";
print "Hello ";



// Variabel

echo "<h2> Variabel </h2>";

$nama = "Chandra Christian";
$prodi = "Sistem Informasi";
$npm = "2110631250035";


echo "<h2>$nama" ;
echo "<br>";
echo " Hello, nama saya ".$nama."Saya kuliah di jurusan ".$prodi." dan NPM saya ".$npm;

// konstanta
echo "<br> <h2> Konstanta </h2>";
const PUBLISHER = "Gramedia";
define("Author", "Rasmus L");

echo "Buku ini ditulis oleh" .Author." dan diterbitkan oleh ".PUBLISHER;


// String
echo "<br> <h2> String </h2>";
echo strlen("Hello World");
echo "<br>";
echo str_word_count("Buku ini ditulis oleh Rasmus L dan diterbitkan oleh Gramedia");
echo "<br>";
echo strrev("Hello World");
echo "<br>";
echo strpos("Buku ini ditulis oleh Rasmus L", "Hello World");
echo "<br>";
echo str_replace("Buku","Chandra Christian", "Hello World");
echo "<br>";


// Array
$books = array("PHP For Beginner","Javascript For
Beginner","Bootstrap For Beginner");
$authors = ["Rasmus Lerdorf","Brendan Eich","Mark Otto"];
// echo $books[1];
// echo "<br>";
// echo $authors[2];

$books[3] = "HTML & CSS For Beginner";
$books[1] = "PHP Restful API";
var_dump($books);
echo $books[0];
unset($books[4]);
echo "<br>";        
var_dump($books);

$books = array(
    "name" => "PHP For Beginner",
    "price" => 5.5,
    "qty" => 15,
    "author" => "Rasmus Lerdorf"
);

    echo "<br>";
    echo "Name: ".$books["name"];
    echo "<br>";
    echo "Price: ".$books["price"];
    
    
// Operator
echo "<br> <h2> String </h2>";
$a = 10;
$b = 20;

$tambah = $a+$b;
echo "hasilnya ".$tambah;
echo "<br>";
var_dump($tambah);

// Percabangan
echo "<br> <h2> Percabangan </h2>";
$price = 95000;
if($price >70600);{
    echo "Very Expensive";
}

echo "<br>";
$books = array("PHP For Beginner","Javascript For
Beginner","Bootstrap For Beginner");
for ($i=0; $i < count($books) ; $i++){ 
    echo $books[$i]."<br>";
}

foreach($books as $books) {
    echo $books."<br>";
}

// Function
echo "<br> <h2> Function </h2>";
    // function show_name($nama){
    //     echo "My name is $nama";
    // }

    // show_name("Chandra Christian");

    function show_name($name)
        {
        return $name;
        }
    echo "My name is " . show_name("Chandra Christian");

?>