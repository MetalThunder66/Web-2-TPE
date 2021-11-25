{include file="templates/header.tpl"}

<h1>{$title}</h1>   

{* {$book|@print_r} *}

{if $book}
    <form action="editar_libro" method="POST" class="my-4">    
{else}
    <form action="agregar_libro" method="POST" class="my-4">
{/if}

    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="titulo">Titulo del libro</label>

                {* Si viene libro para editar, precargo el formulario *}
                {if $book} 
                    <input name="titulo" type="text" class="form-control" value="{$book->nombre_libro}">
                {else}
                    <input name="titulo" type="text" class="form-control">
                {/if}   
            </div>

            {if $book} 
                <select class="visually-hidden" name="idLibro"> {*capturo id?*}
                    <option selected value={$book->id_libro}></option>
                </select>
            {/if} 

            <div class="form-group">
                <label for="anio">Año</label>
                {if $book} 
                    <input name="anio" type="number" class="form-control" value="{$book->anio}">
                {else}
                    <input name="anio" type="number" class="form-control">
                {/if}   
            </div>

            <div class="form-group">
                <label for="genero">Genero</label>
                <select name="genero" class="form-select">
                    {if $book} 
                        <option selected value={$book->genero_fk}>{$book->nombre_gen|capitalize} </option>
                        {foreach from=$genres item=$genre}
                            {* if para que no se repita la categoria en el select *}
                            {if $genre->nombre_gen != $book->nombre_gen}
                                <option value={$genre->id_genero}>{$genre->nombre_gen|capitalize}</option>
                            {/if}
                        {/foreach} 
                    {else}
                        <option disabled selected>Seleccionar un Genero</option>
                        {foreach from=$genres item=$genre}
                            <option value={$genre->id_genero}>{$genre->nombre_gen|capitalize}</option>
                        {/foreach} 
                    {/if}     
                </select>
            </div>
            
            <div class="form-group">
                <label for="autor">Autor</label>
                <select name="autor" class="form-select">    
                    {if $book} 
                        <option selected value={$book->autor_fk}>{$book->nombre_autor|capitalize} </option>
                        {foreach from=$authors item=$author}
                            {* if para que no se repita la categoria en el select *}
                            {if $author->nombre_autor != $book->nombre_autor}
                                <option value={$author->id_autor}>{$author->nombre_autor|capitalize}</option>
                            {/if}
                        {/foreach} 
                    {else}
                        <option disabled selected>Seleccionar un Autor</option>
                        {foreach from=$authors item=$author}
                            <option value={$author->id_autor}>{$author->nombre_autor|capitalize}</option>
                        {/foreach} 
                    {/if}
                </select>
            </div>
            
            <div class="form-group">
                <label for="editoriales">Editorial</label>
                <select name="editoriales" class="form-select">   
                    {if $book} 
                        <option selected value={$book->editorial_fk}>{$book->nombre_editorial|capitalize} </option>
                        {foreach from=$editorials item=$editorial}
                            {* if para que no se repita la categoria en el select *}
                            {if $editorial->nombre_editorial != $book->nombre_editorial}
                                <option value={$editorial->id_editorial}>{$editorial->nombre_editorial|capitalize}</option>
                            {/if}
                        {/foreach} 
                    {else}
                        <option disabled selected>Seleccionar una Editorial</option>
                        {foreach from=$editorials item=$editorial}
                            <option value={$editorial->id_editorial}>{$editorial->nombre_editorial|capitalize}</option>
                        {/foreach} 
                    {/if}
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        {if $book} 
            <textarea name="descripcion" class="form-control" rows="3">{$book->descripcion}</textarea>         
            <button type="submit" class="btn btn-primary mt-2">Editar Libro</button>   
        {else}
            <textarea name="descripcion" class="form-control" rows="3"></textarea>
            <button type="submit" class="btn btn-primary mt-2">Agregar Libro</button>
        {/if}       
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

<ul class="list-group">
  <li class="list-group-item active" aria-current="true">En caso que quieras agregar algun Genero, Editorial o Autor nuevo:</li>
  <li class="list-group-item list-group-item-primary">Genero: <a href="agregar_genero/">Agregar</a> </li>
  <li class="list-group-item list-group-item-primary">Editorial</li>
  <li class="list-group-item list-group-item-primary">Autor</li>
</ul>

{include file="templates/footer.tpl"};