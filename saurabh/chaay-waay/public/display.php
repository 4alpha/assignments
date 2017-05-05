<?php
  $items = array(array(
          'itemName'=> 'Sausage',
          'price'=> 25
        ),
        array(
          'itemName'=> 'Black Olives',
          'price'=> 50
        ),
        array(
          'itemName'=> 'Green Peppers',
          'price'=> 25
        ),
        array(
          'itemName'=> 'Pepperoni',
          'price'=> 50
        ),
        array(
          'itemName'=> 'Sausage',
          'price'=> 25
        ),
        array(
          'itemName'=> 'Black Olives',
          'price'=> 50
        ),
        array(
          'itemName'=> 'Green Peppers',
          'price'=> 25
        )
      );

  $myJSON = json_encode($items);
  echo $myJSON;
?>