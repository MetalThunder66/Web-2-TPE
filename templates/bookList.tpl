{include file="templates/header.tpl"}

<h1>{$title}</h1>

{* {$books|@print_r}     *}

{if $books}
    <table class="table table-secondary table-striped table-hover">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Autor</th>
                <th>Genero</th>
                <th>Ver Libro</th>
                {if isset($smarty.session.USER_ID) && (isset($smarty.session.ROL))}
                    {if $smarty.session.ROL == 1}
                        <th></th>
                    {/if}
                {/if}
            </tr>
        </thead>
        
        <tbody>
                {foreach from=$books item=$book}
                    <tr>
                        <td>{$book->Libro|capitalize}</td>{* agrego Modificadores de variables con el | *}
                        <td>{$book->Autor|capitalize}</td>
                        <td>{$book->Genero|capitalize}</td>
                        <td>
                            <a class="btn btn-primary" href="detalle_libro/{$book->id_libro}">Detalles</a>
                        </td>
                        {if isset($smarty.session.USER_ID) && (isset($smarty.session.ROL))} 
                            {if $smarty.session.ROL == 1}
                                <td>
                                    <a class="btn btn-primary" href="editar_libro/{$book->id_libro}">Editar</a>
                                    <a class="btn btn-danger" href="eliminar/{$book->id_libro}">Eliminar</a>
                                </td>
                            {/if}
                        {/if}
                    </tr>   
                {/foreach} 
        </tbody>
    </table>
{else}
    <h3> Oops! Parece que no existen libros para este genero! </h3>
{/if}

{include file="templates/footer.tpl"};