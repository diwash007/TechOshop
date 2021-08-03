<?php
if(!isset($_SESSION["login_sess"])) 
{
  header("location:../index.php"); 
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0046C2;">
    <a class="navbar-brand" href="home.php" style="font-weight:bold">TechOshop</a>
        <!-- <a class="nav-item nav-link active" href="#">Home</a> -->
      </div>
    </div>
  </nav>