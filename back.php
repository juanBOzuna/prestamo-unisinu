<?php
 $installments = $_REQUEST['installments'];
 $interest = $_REQUEST['interest'];
 $ammount = $_REQUEST['ammount'];
 $name = $_REQUEST['name'];

$installments_sub =  floatval($ammount) / intval($installments) ;

$installments_total = $installments_sub+ (($installments_sub*$interest)/100) ;

// var_dump($total);
header('Location: '."index.php?isResp=1&name=$name&interest=$interest&ammount=$ammount&installments=$installments&priceInstallment=$installments_total");