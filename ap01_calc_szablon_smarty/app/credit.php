<<<<<<< HEAD
<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

use Smarty\Smarty;

$form = array();
$form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
$form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
$form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;

$messages = array();
$result = null;

if ( isset($form['amount']) && isset($form['years']) && isset($form['rate']) ) {

    if ( $form['amount'] == "") $messages[] = 'Nie podano kwoty kredytu.';
    if ( $form['years'] == "") $messages[] = 'Nie podano na ile lat bierzemy kredyt.';
    if ( $form['rate'] == "") $messages[] = 'Nie podano oprocentowania.';

    if (empty( $messages )) {
        if (! is_numeric( $form['amount'] )) $messages[] = 'Kwota kredytu musi być liczbą.';
        else if ($form['amount'] <= 0) $messages[] = 'Kwota kredytu musi być większa od zera.';

        if (! is_numeric( $form['years'] )) $messages[] = 'Liczba lat musi być liczbą.';
        else if ($form['years'] <= 0) $messages[] = 'Liczba lat musi być większa od zera.';   
        
        if (! is_numeric( $form['rate'] )) $messages[] = 'Oprocentowanie musi być liczbą.';
        else if ($form['rate'] < 0) $messages[] = 'Oprocentowanie nie może być ujemne.';
    }

    if (empty ( $messages )) { 
        $amount = floatval($form['amount']);
        $years = intval($form['years']);
        $rate = floatval($form['rate']);

        $months = $years * 12; 
        $monthlyRate = ($rate / 100) / 12; 

        if ($monthlyRate > 0) {
            $calc_result = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$months));
        } else {
            $calc_result = $amount / $months;
        }
    
        $result = round($calc_result, 2);
    }
}

$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator Kredytowy');
$smarty->assign('page_description', 'Proste narzędzie do obliczania miesięcznej raty kredytu.');

$smarty->assign('form', $form);
$smarty->assign('messages', $messages);
$smarty->assign('result', $result);

=======
<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

use Smarty\Smarty;

$form = array();
$form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
$form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
$form['rate'] = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;

$messages = array();
$result = null;

if ( isset($form['amount']) && isset($form['years']) && isset($form['rate']) ) {

    if ( $form['amount'] == "") $messages[] = 'Nie podano kwoty kredytu.';
    if ( $form['years'] == "") $messages[] = 'Nie podano na ile lat bierzemy kredyt.';
    if ( $form['rate'] == "") $messages[] = 'Nie podano oprocentowania.';

    if (empty( $messages )) {
        if (! is_numeric( $form['amount'] )) $messages[] = 'Kwota kredytu musi być liczbą.';
        else if ($form['amount'] <= 0) $messages[] = 'Kwota kredytu musi być większa od zera.';

        if (! is_numeric( $form['years'] )) $messages[] = 'Liczba lat musi być liczbą.';
        else if ($form['years'] <= 0) $messages[] = 'Liczba lat musi być większa od zera.';   
        
        if (! is_numeric( $form['rate'] )) $messages[] = 'Oprocentowanie musi być liczbą.';
        else if ($form['rate'] < 0) $messages[] = 'Oprocentowanie nie może być ujemne.';
    }

    if (empty ( $messages )) { 
        $amount = floatval($form['amount']);
        $years = intval($form['years']);
        $rate = floatval($form['rate']);

        $months = $years * 12; 
        $monthlyRate = ($rate / 100) / 12; 

        if ($monthlyRate > 0) {
            $calc_result = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$months));
        } else {
            $calc_result = $amount / $months;
        }
    
        $result = round($calc_result, 2);
    }
}

$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator Kredytowy');
$smarty->assign('page_description', 'Proste narzędzie do obliczania miesięcznej raty kredytu.');

$smarty->assign('form', $form);
$smarty->assign('messages', $messages);
$smarty->assign('result', $result);

>>>>>>> 2f70351fb7e82c9cff2959121bb68087c6adeb56
$smarty->display(_ROOT_PATH.'/app/credit_view.html');