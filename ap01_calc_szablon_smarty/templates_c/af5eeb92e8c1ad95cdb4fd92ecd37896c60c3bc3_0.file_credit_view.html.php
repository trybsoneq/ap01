<?php
/* Smarty version 5.4.2, created on 2026-03-24 13:32:29
  from 'file:C:\xampp\htdocs\ap01_calc_szablon_smarty/app/credit_view.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_69c2845d983d55_19762970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af5eeb92e8c1ad95cdb4fd92ecd37896c60c3bc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty/app/credit_view.html',
      1 => 1774355433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69c2845d983d55_19762970 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_121813770569c2845d667816_32156081', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19985829069c2845d9833b2_06819084', 'sidebar');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_121813770569c2845d667816_32156081 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\app';
?>

<article class="box post">
    <header>
        <h2>Oblicz swoją <strong>miesięczną ratę</strong></h2>
    </header>
    
    <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/credit.php" method="post">
        <div class="row gtr-50 gtr-uniform">
            <div class="col-12">
                <label for="id_amount">Kwota kredytu (zł):</label>
                <input id="id_amount" type="text" name="amount" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')['amount'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="background-color: #fff; padding: 0.5em;" />
            </div>
            <div class="col-6 col-12-mobilep">
                <label for="id_years">Liczba lat:</label>
                <input id="id_years" type="text" name="years" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')['years'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="background-color: #fff; padding: 0.5em;" />
            </div>
            <div class="col-6 col-12-mobilep">
                <label for="id_rate">Oprocentowanie (%):</label>
                <input id="id_rate" type="text" name="rate" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')['rate'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" style="background-color: #fff; padding: 0.5em;" />
            </div>
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Oblicz ratę" class="button icon solid fa-calculator" /></li>
                </ul>
            </div>
        </div>
    </form>

        <?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
        <div style="margin-top: 2em; padding: 1.5em; border: 2px solid #f56a6a; background-color: #fcebeb; border-radius: 0.5em;">
            <h3 style="color: #f56a6a; margin-bottom: 0.5em;">Wystąpiły błędy:</h3>
            <ul style="margin-bottom: 0;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    <?php }?>

        <?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
        <div style="margin-top: 2em; padding: 2em; background-color: #e6f6e6; border-left: 5px solid #4CAF50; border-radius: 0.5em;">
            <h3 style="margin-bottom: 0.5em;">Wynik obliczeń:</h3>
            <p style="font-size: 1.5em; font-weight: bold; margin: 0; color: #333;">Miesięczna rata: <?php echo $_smarty_tpl->getValue('result');?>
 zł</p>
        </div>
    <?php }?>

</article>
<?php
}
}
/* {/block 'content'} */
/* {block 'sidebar'} */
class Block_19985829069c2845d9833b2_06819084 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\ap01_calc_szablon_smarty\\app';
?>

<section>
    <ul class="divided">
        <li>
            <article class="box excerpt">
                <header>
                    <span class="date">Ważne</span>
                    <h3><a href="#">Jak działa kalkulator?</a></h3>
                </header>
                <p>Kalkulator podaje kwotę szacunkową (ratę stałą) bez kosztów okołokredytowych.</p>
            </article>
        </li>
        <li>
            <article class="box excerpt">
                <header>
                    <span class="date">Wskazówka</span>
                    <h3><a href="#">Wpisywanie danych</a></h3>
                </header>
                <p>Pamiętaj, aby oprocentowanie wpisywać jako liczbę (np. 8 lub 8.5), bez znaku procenta na końcu.</p>
            </article>
        </li>
    </ul>
</section>
<?php
}
}
/* {/block 'sidebar'} */
}
