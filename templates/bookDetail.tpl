{include file="templates/header.tpl"}

<h1>{$title}</h1>

 {* {$book|@print_r}    *}

<table class="table table-secondary table-striped table-hover">
    <thead>
        <tr>
            <th>Libro</th>
            <th>Autor</th>
            <th>Ciudad Autor</th>
            <th>Genero</th>
            <th>Nombre Editorial</th>
            <th>Ciudad Editorial</th>
            <th>Año</th>
        </tr>
    </thead>

    <tbody>
            <tr>
                <td>{$book->nombre_libro|capitalize}</td> {* agrego Modificadores de variables con el | *}
                <td>{$book->nombre_autor|capitalize}</td>
                <td>{$book->ciudad_autor|capitalize}</td>
                <td>{$book->nombre_gen|capitalize}</td>
                <td>{$book->nombre_editorial|capitalize}</td>
                <td>{$book->ciudad_editorial|capitalize}</td>
                <td>{$book->anio|capitalize}</td>
            </tr> 
    </tbody>
</table> 

<h2> Descripcion </h2>
<p> {$book->descripcion} </p>

<a class="btn btn-primary" href="listar">Volver</a>

{include file="templates/footer.tpl"};