<?php
/*
PATHS.PHP
Define o caminho das pastas e arquivos.
*/

//Descobre o nome da pasta raiz onde está publicado
$folder = explode("/",$_SERVER['REQUEST_URI']);
$folder = "/".$folder[1]."/";

//Caminho onde esta publicado
$include= $_SERVER['DOCUMENT_ROOT'].$folder;

//Descobre o nome do host
$file= "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$folder;

//monta o caminho para arquivos CSS, JS, IMG, etc(escrever tanto cansa)
$pathCSS=$file."resources/css/";
$pathJS=$file."resources/js/";
$pathIMG=$file."resources/img/";
$pathICONS=$file."resources/icons/";
$pathVALIDATE=$file."resources/js/validate";

//monta o caminho que é utilizado no INCLUDE do PHP
$includeLANGUAGE=$include."resources/languages/";
$includeCSS=$include."resources/css/";
$includeJS=$include."resources/js/";
$includeIMG=$include."resources/img/";
$includeICONS=$include."resources/icons/";

//caminho das paginas
$linkTickets=$file."view/ocomon/consultTicketOperator.php";
$linkOpenTicket=$file."view/ocomon/openTicket.php";
$linkError=$file."view/geral/error.php";
$linkLogin=$file."index.php";
$linkConfigGeral=$file."view/admin/configGeral.php";


$controllerLogin=$file."controller/LoginController.php";
$controllerDataTable=$file."controller/DataTableController.php";
$daoDataTable=$include."model/dao/DataTableDAO.class.php";

$controllerSelectOption=$include."controller/SelectOptionController.php";
$controllerGeneral=$include."controller/GeneralController.php";
$daoGeneral=$include."model/dao/GeneralDAO.class.php";
$includeBody=$include."view/geral/body.php";
$includeHead=$include."view/geral/head.php";
//$includeHead=$include."";

$daoLogin=$include."model/dao/LoginDAO.class.php";
$beanLogin=$include."model/bean/Login.class.php";
$daoSelectOption=$include."model/dao/SelectOptionDAO.class.php";
?>