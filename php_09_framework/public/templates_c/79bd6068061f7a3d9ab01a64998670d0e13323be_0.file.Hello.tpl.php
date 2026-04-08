<?php
/* Smarty version 3.1.33, created on 2026-04-08 11:04:14
  from 'C:\xampp\htdocs\php_09_framework\app\views\Hello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_69d61a0e1178a0_20543258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79bd6068061f7a3d9ab01a64998670d0e13323be' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09_framework\\app\\views\\Hello.tpl',
      1 => 1775639028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69d61a0e1178a0_20543258 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Hello World | Amelia framework</title>
</head>

<body>
    
    My value: <?php echo $_smarty_tpl->tpl_vars['value']->value;?>

    
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

</body>

</html><?php }
}
