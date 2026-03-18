<?php
require_once dirname(__FILE__).'/../config.php';

$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
$rate = isset($_REQUEST['rate']) ? $_REQUEST['rate'] : null;

$messages = array();

if ( ! (isset($amount) && isset($years) && isset($rate))) {
	$messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
} else {
    if ( $amount == "") {
        $messages[] = 'Nie podano kwoty kredytu.';
    }
    if ( $years == "") {
        $messages[] = 'Nie podano na ile lat bierzemy kredyt.';
    }
    if ( $rate == "") {
        $messages[] = 'Nie podano oprocentowania.';
    }

    if (empty( $messages )) {
        
        if (! is_numeric( $amount )) {
            $messages[] = 'Kwota kredytu musi być liczbą.';
        } else if ($amount <= 0) {
            $messages[] = 'Kwota kredytu musi być większa od zera.';
        }

        if (! is_numeric( $years )) {
            $messages[] = 'Liczba lat musi być liczbą.';
        } else if ($years <= 0) {
            $messages[] = 'Liczba lat musi być większa od zera.';
        }   
        
        if (! is_numeric( $rate )) {
            $messages[] = 'Oprocentowanie musi być liczbą.';
        } else if ($rate < 0) {
            $messages[] = 'Oprocentowanie nie może być ujemne.';
        }
    }
}

if (empty ( $messages )) { 

	$amount = floatval($amount);
	$years = intval($years);
	$rate = floatval($rate);

    $months = $years * 12; 
    $monthlyRate = ($rate / 100) / 12; 

    if ($monthlyRate > 0) {
        $result = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$months));
    } else {
        $result = $amount / $months;
    }
 
    $result = round($result, 2);
}

include 'credit_view.php';