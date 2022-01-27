<?php
	include_once('../model/model_personal.php');
	$personal = new Personal();
	$res = $personal->getListaDePesonal();
	echo $res;