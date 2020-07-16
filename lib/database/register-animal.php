<?php

include ('connect.php');

function insert($nome_animal, $proprietario, $cor_animal, $date_nasc, $sexo_animal, $porte_animal, $pelagem_animal){
	include('connect.php');
    $query = 
            "INSERT INTO animals (nome_animal, proprietario, cor_animal,
                idade, sexo_animal, porte_animal, pelagem_animal) 
                VALUES ('{$nome_animal}', '{$proprietario}', '{$cor_animal}', 
                $date_nasc, $sexo_animal, '{$porte_animal}', '{$pelagem_animal}' )";

    return $result = mysqli_query($con, $query);

}

