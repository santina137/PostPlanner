<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/public/css/reset.css">
    <link rel="stylesheet" href="src/public/css/style.css">
</head>
<body>
    
<?php if ($_SESSION['status']==="1"):?>
<nav class="menu">
      <ul class=menu-items>
        <li>
          <a href="?page=account">Mon compte</a>
        <li>
          <a href="?page=posts">Publications</a>
        </li>
        <li>
          <a href="?page=socialNetworks">Réseaux sociaux</a>
        </li>
        <li>
          <a href="?page=hashtags">Hashtags</a>
        </li>
        <li>
          <a href="?page=createAccount">Créer un compte</a>
        </li>
        <li>
           <a href="?page=logout">Se déconnecter</a>
        </li>
      </ul>
</nav>
<?php elseif($_SESSION['status']==="2"):?>
  <nav class="menu">
      <ul class=menu-items>
        <li>
          <a href="?page=account">Mon compte</a>
        <li>
          <a href="?page=posts">Publications</a>
        </li>
        <li>
           <a href="?page=logout">Se déconnecter</a>
        </li>
      </ul>
</nav>
<?php endif;?>


  



