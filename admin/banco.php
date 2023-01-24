<?php

// para cira um objeto pho use '$nome_object'
// criando um objeto do tipo mysqli - mysqli é uma bliblioteca nativa do php
$banco = new mysqli("localhost", "root", "Capricornioesmeralda#1", "ecomerce");

// -> é uma referencia ao objeto
if ($banco->connect_errno) {
    echo "<p> Encontrei um erro $banco->errno --> $banco->connect_errno</p>";
    die();
}

// transformando os dados em UTF8
$banco->query("SET NAMES 'utf8'");
$banco->query("SET character_set_connection=utf8");
$banco->query("SET character_set_client=utf8");
$banco->query("SET character_set_results=utf8");
