<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-14 02:07:54
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe 2_Parte_1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_616774dac5ddd9_29357829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5209e1af37b6ed79476f06f840e966fe094724a' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe 2_Parte_1\\templates\\header.tpl',
      1 => 1634170053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616774dac5ddd9_29357829 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <base href=<?php echo BASE_URL;?>
>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL;?>
">Home</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">a</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Proximamnte</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registrar">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Inicio contenido principal -->
    <div class="container">
<!-- Content here --><?php }
}
