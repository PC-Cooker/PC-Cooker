<?php

$mysqli = new mysqli('localhost','root','','test');

$mysqli->query("SET NAMES utf8");

if(!isset($_SESSION)){
    session_start();
}