
<?php
// page2.php

session_start();

echo 'Welcome to page #2<br />';

echo $_SESSION['favcolor'].'<br>'; // green
echo $_SESSION['animal'].'<br>';   // cat
echo date('Y m d H:i:s', $_SESSION['time']).'<br>';

// You may want to use SID here, like we did in page1.php
echo '<br /><a href="page1.php">page 1</a>';
?>
