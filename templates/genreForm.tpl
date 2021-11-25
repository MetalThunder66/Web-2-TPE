{include file="templates/header.tpl"}

<h1>{$title}</h1>

{if $genre}
    <form action="editar_genero" method="POST" class="my-4">  
{else}
    <form action="agregar_genero" method="POST" class="my-4">
{/if}
        <div class="row">
            <div class="mb-3">
                <div class="form-group">
                    <label for="nombreGen">Nombre del Genero</label>
                        <input name="nombreGen" type="text" class="form-control" {if $genre}value="{$genre->nombre_gen}"{/if}>
                </div>
                {if $genre}
                    <select class="visually-hidden" name="idGen">
                        <option selected value={$genre->id_genero}></option>
                    </select> 
                    <button type="submit" class="btn btn-primary mt-2">Editar Genero</button>
                {else}
                    <button type="submit" class="btn btn-primary mt-2">Agregar Genero</button>
                {/if}   
            </div>
        </div>  
    </form>

{if $error}
    <div class="alert alert-danger">
        {$error}
    </div>
{elseif $exito}
    <div class="alert alert-success">
        {$exito}
    </div>
{/if}

{include file="templates/footer.tpl"};