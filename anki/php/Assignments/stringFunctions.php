<!--Date functions -->
<?php
    echo addcslashes("Ankita Bagade ", 'a'); 
    echo "<br>";
    
    echo addslashes("asd 'ANkita Bagade' asdf");
    echo "<br>";
    
    echo bin2hex('ankita');//converts a string of ASCII characters to hexadecimal values
    echo "<br>Hello";
    
    echo chop("       mutant technologies            ");echo "Hello";//similar to rtrim()
    echo "<br>";
    
    echo chr(0x67); //returns ascii value 
    echo "<br>";

    echo chunk_split("Hello+WOrld",1,'.'); //splits a string into a series of smaller parts
    echo "<br>";

    echo convert_cyr_string("Hello world! ���",'w','a');
    echo convert_uudecode("0=&5S=`IT97AT('1E>'0-@```");
    echo convert_uuencode("test\ntext text\r\n");
    echo crypt('mypassword');
    echo "<br>";

    echo count_chars("ankita bagade",3); //here 3 is string with all the different characters used
    echo "<br>";

    $checksum = crc32("The quick brown fox jumped over the lazy dog.");
    printf("%u\n", $checksum);
    echo "<br>";

    $ex1=explode(" ","Today is beautiful day ..");
    echo $ex1[0];echo $ex1[1];echo $ex1[2];echo $ex1[3];echo $ex1[4];
    echo "<br>";

    $array = array('firstname','lastname', 'email', 'phone');
    $comma_separated = implode(",", $array); //similar as join()
    echo $comma_separated; 
    echo "<br>";

    $filename = "temp.php";
    $md5file = md5_file($filename);
    echo $md5file;
    echo "<br>";
    echo md5("Hello");
    echo "<br>";

    echo nl2br("Welcome\r\nThis is my HTML document", false);
    echo "<br>";

    echo ord("A");//wriitten ascii value of character
    echo "<br>";

    $var_1 = 'PHP IS GREAT';
    $var_2 = 'WITH MYSQL';
    similar_text($var_1, $var_2, $percent);
    echo $percent;
    echo "<br>"; 

    echo str_shuffle("4alpha");
?>


