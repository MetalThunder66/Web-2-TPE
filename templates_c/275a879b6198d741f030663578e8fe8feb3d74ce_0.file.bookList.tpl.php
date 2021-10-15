<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-15 02:01:26
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe_2_Parte_1\templates\bookList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6168c4d65c85b2_89635186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '275a879b6198d741f030663578e8fe8feb3d74ce' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\templates\\bookList.tpl',
      1 => 1634256005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6168c4d65c85b2_89635186 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\libs\\smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
                <tr>
                    <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->Libro);?>
</td>                    <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->Autor);?>
</td>
                    <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->Genero);?>
</td>
                    <td>
                        <a class="btn btn-primary" href="detalle_libro/<?php echo $_smarty_tpl->tpl_vars['book']->value->id_libro;?>
">Detalles</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="editar/<?php echo $_smarty_tpl->tpl_vars['book']->value->id_libro;?>
">Editar</a>
                        <a class="btn btn-danger" href="eliminar/<?php echo $_smarty_tpl->tpl_vars['book']->value->id_libro;?>
">Eliminar</a>
                    </td>
                </tr>   
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    </tbody>
</table>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
