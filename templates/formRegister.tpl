{include file="templates/header.tpl"}

<h1>{$title}</h1>

<form method="POST" action="registrar">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Direccion de Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

     {if isset($smarty.session.USER_ID) && ($smarty.session.ROL == 1)} {*Si el usuario logueado es admin, pregunto para darle el rol al nuevo usuario *}
        <p> ¿Desea que el nuevo usuario sea Administrador? </p>

        <div class="mb-3" role="group">
            <label for="rol">Si</label>
            <input type="radio" name="rol" value="1">
            <label for="rol">No</label>
            <input type="radio" name="rol" value="0">
        </div>
    {/if}   
  
    {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
    {else if $exito}
        <div class="alert alert-success">
            {$exito}
        </div>
    {/if}

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </div>
    
</form>

{include file="templates/footer.tpl"};