<?php

$conexao = mysqli_connect(
    "localhost",
    "root",
    "root",
    "biblioteca"
);

if(!$conexao) {
    die("Erro de conexâo" . mysqli_connect_error());
    }