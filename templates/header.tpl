<!DOCTYPE html>
<html lang="en">

<head>
    <base href={BASE_URL}>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Biblioteca Digital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="listar">Libros</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Generos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {foreach from=$genres item=$genre}
                                    <li>
                                        <a class="dropdown-item"
                                            href="libros_genero/{$genre->nombre_gen}">{$genre->nombre_gen|capitalize}
                                        </a>
                                    </li>
                                {/foreach}
                            </ul>
                        </li>

                        {if isset($smarty.session.USER_ID) && ($smarty.session.ROL == 1)}
                            <li class="nav-item">
                                <a class="nav-link" href="agregar_libro/">Agregar Libro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listar_generos/">Modificar Generos</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="listar_usuarios/">Listar Usuarios</a>
                            </li>  
                        {/if}
                    </ul>

                    <ul class="nav justify-content-end">
                        
                        {if (!isset($smarty.session.USER_ID) || ($smarty.session.ROL == 1)) }  
                            <li class="nav-item">
                                <a class="nav-link" href="registrar">Registrar Usuario</a>
                            </li>
                        {/if}

                        {if isset($smarty.session.USER_ID)}    
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="logout">({$smarty.session.USER_EMAIL})
                                    Logout</a>
                            </li>
                        {else}
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login">Login</a>
                            </li>
                        {/if}

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Inicio contenido principal -->
    <div class="container">
<!-- Content here -->