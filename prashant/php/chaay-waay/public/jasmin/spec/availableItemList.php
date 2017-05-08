<?php
 $avialableItemsArray = array(	
		array("itemCode"=>1, "itemName"=>"mango", "quantity"=> 1, "price"=>250),
		array("itemCode"=>2, "itemName"=>'strawberry',"quantity"=> 1, "price"=>350),
		array("itemCode"=>3, "itemName"=>'watermelon', "quantity"=> 1, "price"=>80),
		array("itemCode"=>4, "itemName"=>'melon', "quantity"=> 1, "price"=>50),
		array("itemCode"=>5, "itemName"=>'apple', "quantity"=> 1, "price"=>150)
		);
	$avialableItemsList = json_encode($avialableItemsArray);
	echo $avialableItemsList;
 ?>