<?php

include ('connect.php');

function select(){
	include('connect.php');
    $query = 
            "SELECT * FROM animals WHERE 1 = 1 ";

    return $result = mysqli_query($con, $query);

}
