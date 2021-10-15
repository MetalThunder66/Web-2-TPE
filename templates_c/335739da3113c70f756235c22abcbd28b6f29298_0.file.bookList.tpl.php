<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-14 02:03:56
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe 2 Parte 1\templates\bookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_616773ec1116c4_90650118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '335739da3113c70f756235c22abcbd28b6f29298' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe 2 Parte 1\\templates\\bookList.tpl',
      1 => 1634168615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_616773ec1116c4_90650118 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>

<form action="insertar" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Titulo</label>
                <input name="titulo" type="text" class="form-control">
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
</form>

<ul class="list-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks']->value, 'task');
$_smarty_tpl->tpl_vars['task']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['task']->value) {
$_smarty_tpl->tpl_vars['task']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['task']->value->finalizada == 1) {?>
            <li class='list-group-item-success'>
                <?php echo $_smarty_tpl->tpl_vars['task']->value->titulo;?>
 - <?php echo $_smarty_tpl->tpl_vars['task']->value->prioridad;?>
 
                <a class="btn btn-danger" href="eliminar/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">Borrar</a>
            </li>
        <?php } else { ?>
            <li class='list-group-item'>
                <?php echo $_smarty_tpl->tpl_vars['task']->value->titulo;?>
 - <?php echo $_smarty_tpl->tpl_vars['task']->value->prioridad;?>
 
                <a class="btn btn-danger" href="eliminar/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">Eliminar</a>
                <a class="btn btn-primary" href="completar/<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">Completar</a>
            </li>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
