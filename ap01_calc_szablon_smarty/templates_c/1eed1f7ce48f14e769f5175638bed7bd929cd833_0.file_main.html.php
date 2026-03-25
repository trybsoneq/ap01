<?php
/* Smarty version 5.4.2, created on 2026-03-24 13:32:29
  from 'file:C:\xampp\htdocs\ap01_calc_szablon_smarty\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_69c2845db8b2f7_76880297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1eed1f7ce48f14e769f5175638bed7bd929cd833' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\app\\../templates/main.html',
      1 => 1774355419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69c2845db8b2f7_76880297 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Kalkulator Kredytowy" ?? null : $tmp);?>
</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/css/main.css" />
    </head>
    <body class="homepage is-preload">
        <div id="page-wrapper">

            <section id="header">
                <div class="container">
                    <h1 id="logo"><a href="<?php echo $_smarty_tpl->getValue('app_url');?>
"><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Kalkulator Raty" ?? null : $tmp);?>
</a></h1>
                    <p><?php echo (($tmp = $_smarty_tpl->getValue('page_description') ?? null)===null||$tmp==='' ? "Proste narzędzie do obliczania miesięcznej raty kredytu." ?? null : $tmp);?>
</p>

                    <nav id="nav">
                        <ul>
                            <li><a class="icon solid fa-home" href="<?php echo $_smarty_tpl->getValue('app_url');?>
"><span>Start</span></a></li>
                            <li><a class="icon solid fa-calculator" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/credit.php"><span>Kalkulator</span></a></li>
                            <li><a class="icon solid fa-info-circle" href="#"><span>O nas</span></a></li>
                        </ul>
                    </nav>
                </div>
            </section>

            <section id="main">
                <div class="container">
                    <div class="row">
                        <div id="content" class="col-8 col-12-medium">
                            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_102290339169c2845db89fb4_98623131', 'content');
?>

                        </div>

                        <div id="sidebar" class="col-4 col-12-medium">
                            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_174584604469c2845db8a606_26042477', 'sidebar');
?>

                        </div>
                    </div>
                </div>
            </section>

            <section id="footer">
                <div class="container">
                    <div id="copyright" class="container">
                        <ul class="links">
                            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_100906969769c2845db8aa07_34638468', 'footer');
?>

                        </ul>
                    </div>
                </div>
            </section>

        </div>

        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/main.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
/* {block 'content'} */
class Block_102290339169c2845db89fb4_98623131 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\templates';
?>
 Domyślna treść zawartości... <?php
}
}
/* {/block 'content'} */
/* {block 'sidebar'} */
class Block_174584604469c2845db8a606_26042477 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\templates';
?>
 Domyślny pasek boczny... <?php
}
}
/* {/block 'sidebar'} */
/* {block 'footer'} */
class Block_100906969769c2845db8aa07_34638468 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\templates';
?>

                            <li>&copy; Kalkulator Kredytowy. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            <?php
}
}
/* {/block 'footer'} */
}
