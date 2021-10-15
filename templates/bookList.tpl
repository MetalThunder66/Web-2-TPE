{include file="templates/header.tpl"}

<h1>{$title}</h1>

</form>

<table class="table table-secondary table-striped table-hover">
    <thead>
        <tr>
            <th>Libro</th>
            <th>Autor</th>
            <th>Genero</th>
            <th>Ver Libro</th>
            <th></th>
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
                    <td>
                        <a class="btn btn-primary" href="editar/{$book->id_libro}">Editar</a>
                        <a class="btn btn-danger" href="eliminar/{$book->id_libro}">Eliminar</a>
                    </td>
                </tr>   
            {/foreach} 
    </tbody>
</table>

{include file="templates/footer.tpl"};