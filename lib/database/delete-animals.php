<?php
session_start();
include ('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = 
        "DELETE FROM animals WHERE id = '{$id}' ";

$result = mysqli_query($con, $query);

if(mysqli_affected_rows($con)){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('PET DELETADO COM SUCESSO')
    window.location.href='../../index.php';
    </SCRIPT>");
}