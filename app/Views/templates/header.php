<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Teste de Programação Plyn</title>

 <link href="<?php echo site_url() ?>css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo site_url() ?>css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo site_url() ?>">Teste de Programação Plyn</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">

    <?php if(  session()->get('isLogged') ): ?>
        <li><a href="<?php echo site_url() ?>list">Usuários</a></li>
       
        <!-- this logoff link has a script with ajax that redirect user -->
        <li> <a id="logoff" href="<?php echo site_url() ?>list">Logoff</a></li>
       
    <?php endif ?>
     <!-- <li><a href="#">Opções</a></li>
     <li><a href="#">Perfil</a></li>
     <li><a href="#">Ajuda</a></li> -->
    </ul>
   </div>
  </div>
 </nav>
 
