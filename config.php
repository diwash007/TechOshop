<?php
   session_start();
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', ''); //pPxuUaM(grf_U9?s
   define('DB_DATABASE', 'techoshop');
   $dbc = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>