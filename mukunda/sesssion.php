 <?php

session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.<br>";
echo $_SESSION["favcolor"]."<br>";
echo $_SESSION["favanimal"]."<br>";

print_r($_SESSION);

unset($_SESSION);
echo "<br>session is destroy";

?>

</body>
</html> 