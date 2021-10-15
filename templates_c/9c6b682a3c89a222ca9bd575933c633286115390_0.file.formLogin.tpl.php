<?php
/* Smarty version 4.0.0-rc.0, created on 2021-10-15 00:35:02
  from 'C:\Utilidades\Xampp\htdocs\web2\Tpe_2_Parte_1\templates\formLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0-rc.0',
  'unifunc' => 'content_6168b096547590_33923542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c6b682a3c89a222ca9bd575933c633286115390' => 
    array (
      0 => 'C:\\Utilidades\\Xampp\\htdocs\\web2\\Tpe_2_Parte_1\\templates\\formLogin.tpl',
      1 => 1634250897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_6168b096547590_33923542 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

<form method="POST" action="login">
    <div class="mb-3">
        <label for="email" class="form-label">Direccion de Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="alert alert-danger">
            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

        </div>
    <?php }?>

    <button type="submit" class="btn btn-primary">Login</button>

</form>

<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
