<?php

REQUIRE ('connexion.php');


CONST IDENTIFIANT ='test';

CONST MDP ='test123';

$username="";

if(isset($_POST['username'])) { $username=$_POST['username'];};

if(isset($_POST['password'])) { $password=$_POST['password'];}; 
