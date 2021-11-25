{include file="templates/header.tpl"}

<h1>{$title}</h1>

{if $success}
    <div class="alert alert-success">
        {$success}
    </div>
{/if}    

<table class="table table-secondary table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre Usuario</th>
            <th>Email</th>
            <th>Rol</th>           
            <th>Accion</th>
        </tr>
    </thead>

    <tbody>
            {foreach from=$users item=$user}
                <tr>
                    <td>{$user->nombre|capitalize}</td>
                    <td>{$user->email}</td>
                    {if $user->rol == 1}
                        <td>Admin</td>
                    {else}
                        <td>User</td>
                    {/if}
                    <td>
                        <a class="btn btn-primary" href="cambiar_rol/{$user->id}">Cambiar Rol</a>
                        <a class="btn btn-danger" href="eliminar_usuario/{$user->id}">Eliminar</a>
                    </td>
                </tr>   
            {/foreach} 
    </tbody>
</table>

<ul class="list-group">
  <li class="list-group-item list-group-item-primary">Agregar nuevo Usuario: <a href="registrar/">Aqui</a> </li>
</ul>

{include file="templates/footer.tpl"};