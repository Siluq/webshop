<?php
// Default function
/**
 * Standaard functie definitie
 * @param string Dit noem je een parameter (die staat tussen haakjes)
 * @return array Dit is de waarde die je functie doorgeef
 */
function productOverzicht(){
    global $con; // dit is je database connectie

    //------
    $query1 = $con->query('SELECT `name`, `price` FROM `product`');
    // return "Hallo";
   
	
}
?>
