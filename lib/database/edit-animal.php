<?php

include ('connect.php');

function update($nome_animal, $proprietario, $cor_animal, $date_nasc, $sexo_animal, $porte_animal, $pelagem_animal, $id){
	include('connect.php');
    $query = 
            "UPDATE animals SET nome_animal = '{$nome_animal}', proprietario = '{$proprietario}', 
                cor_animal = '{$cor_animal}', idade = '{$date_nasc}', sexo_animal = '{$sexo_animal}', 
                porte_animal = '{$porte_animal}', pelagem_animal = '{$pelagem_animal}'
            WHERE id = $id; ";

   
   return print_r($result = mysqli_query($con, $query));
}

