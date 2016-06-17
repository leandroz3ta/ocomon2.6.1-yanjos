<?php

$folder = explode("/",$_SERVER['REQUEST_URI']);
$folder = "/".$folder[1]."/";

$file= "http://".$_SERVER['SERVER_NAME'].$folder;
$include= $_SERVER['DOCUMENT_ROOT'];

$folder = explode("/",$_SERVER['REQUEST_URI']);
$folder = "/".$folder[1]."/";

$pathCSS=$file."resources/css/";
$pathJS=$file."resources/js/";
$pathIMG=$file."resources/img/";
$pathICONS=$file."resources/icons/";


$includeLANGUAGE=$include.$folder."resources/languages/";
$includeCSS=$include.$folder."resources/css/";
$includeJS=$include.$folder."resources/js/";
$includeIMG=$include.$folder."resources/img/";
$includeICONS=$include.$folder."resources/icons/";

$linkTickets=$file."view/ocomon/consultTicketOperator.php";
$linkOpenTicket=$file."view/ocomon/formOpenTicket.php";
?>