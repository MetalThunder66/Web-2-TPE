{include file="templates/header.tpl"}

<h1>{$title}</h1>

{if $error}
    <div class="alert alert-danger">
        {$error}
    </div>
{elseif $exito}
    <div class="alert alert-success">
        {$exito}
    </div>
{/if}

<ul class="list-group">
  <li class="list-group-item list-group-item-primary">Agregar nuevo Genero: <a href="agregar_genero">Aqui</a> </li>
</ul>

<table class="table table-secondary table-striped table-hover">  
    <tbody>
            {foreach from=$genres item=$genre}
                <tr>
                    <td>{$genre->nombre_gen|capitalize}</td>
                    <td>
                        <a class="btn btn-primary" href="editar_genero/{$genre->id_genero}">Editar</a>
                        <a class="btn btn-danger" href="eliminar_genero/{$genre->id_genero}">Eliminar</a>
                    </td>
                </tr>   
            {/foreach} 
    </tbody>
</table>

{include file="templates/footer.tpl"};
