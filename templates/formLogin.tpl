{include file="templates/header.tpl"}

<h1>{$title}</h1>

<form method="POST" action="login">
    <div class="mb-3">
        <label for="email" class="form-label">Direccion de Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
    {/if}

    <button type="submit" class="btn btn-primary">Login</button>

</form>

{include file="templates/footer.tpl"};