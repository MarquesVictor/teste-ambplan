<?php 
	//Conectando com o bacno e testando 
	if(!$con = mysqli_connect("localhost",'root','')){
		//Se não conseguir se conectar com o SDBG
		echo "Erro ao conectar!!!";	
	}
	if(!mysqli_select_db($con,"teste-ambplan")){
		//Se não achar a base de dados
		echo "Erro ao selecionar a base de dados!!!";	
	}

mysqli_query($con,"SET NAMES utf8;");	