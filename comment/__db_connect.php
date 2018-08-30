<?php

$mysqli = new mysqli('localhost', 'admin', 'admin', 'PCCooker');

$mysqli->query("SET NAMES utf8");

if(!isset($_SESSION)){
    session_start();
}