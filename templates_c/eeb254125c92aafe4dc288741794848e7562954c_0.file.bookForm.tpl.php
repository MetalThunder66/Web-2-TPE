<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-15 03:30:27
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe_2_Parte_1\templates\bookForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6168d9b3b52282_77706059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eeb254125c92aafe4dc288741794848e7562954c' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\templates\\bookForm.tpl',
      1 => 1634260818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6168d9b3b52282_77706059 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

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

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
