<?php
ob_start(); 
session_start();
//session_destroy();

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); // definisce il separatore di cartelle

defined('FRONT_END') ? null : define('FRONT_END', __DIR__ . DS . 'templates/frontend'); // costante che definisce la cartella delle pagine frontend

defined('BACK_END') ? null : define('BACK_END', __DIR__ . DS . 'templates/backend'); // costante che definisce la cartella delle pagine backend

defined('IMG_UPLOADS') ? null : define('IMG_UPLOADS', __DIR__ . DS . 'img');

//echo  IMG_UPLOADS;

//configurazione del database

define('DB_HOST', 'localhost');
define('DB_UTENTE', 'root');
define('DB_PASSWORD', '');
define('DB_NOME', 'negozio');

$connection = mysqli_connect(DB_HOST, DB_UTENTE, DB_PASSWORD, DB_NOME);

require_once('functions.php');

//if(!$connection){
//    echo 'Errore di connessione al database';
//} else {
//    echo 'Connessione al database effettuata con successo';
//}