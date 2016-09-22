<?php

include_once($daoSelectOption); // Classe DAO

$selectOptionDAO = new SelectOptionDAO();


$area = $selectOptionDAO->area();

$filial = $selectOptionDAO->filial();

$localizacao = $selectOptionDAO->localizacao();

