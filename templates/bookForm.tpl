{include file="templates/header.tpl"}

<h1>{$title}</h1>

 <form action="agregar" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Titulo del libro</label>
                <input name="nombre_libro" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Año</label>
                <input name="anio" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input name="descripcion" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label">Prioridad</label>
                <select name="prioridad" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div> 

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>

{include file="templates/footer.tpl"};