<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-14 20:23:37
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe_2_Parte_1\templates\bookDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_616875a9a150d7_90897969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a81b3450af9f6a622fe99c3d730a479e30f3a5c' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\templates\\bookDetail.tpl',
      1 => 1634235813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_616875a9a150d7_90897969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\libs\\smarty\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

 
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
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->nombre_libro);?>
</td>                 <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->nombre_autor);?>
</td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->ciudad_autor);?>
</td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->nombre_gen);?>
</td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->nombre_editorial);?>
</td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->ciudad_editorial);?>
</td>
                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['book']->value->anio);?>
</td>
            </tr> 
    </tbody>
</table> 

<h2> Descripcion </h2>
<p> <?php echo $_smarty_tpl->tpl_vars['book']->value->descripcion;?>
 </p>

<a class="btn btn-primary" href="listar">Volver</a>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
