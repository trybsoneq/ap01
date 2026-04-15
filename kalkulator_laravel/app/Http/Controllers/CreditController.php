<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        return view('credit.index');
    }

    public function calc(Request $request)
    {
        $amount = $request->input('amount');
        $years = $request->input('years');
        $rate = $request->input('rate');

        $messages = [];
        $result = null;

        if ($amount == "") $messages[] = 'Nie podano kwoty kredytu.';
        if ($years == "") $messages[] = 'Nie podano na ile lat bierzemy kredyt.';
        if ($rate == "") $messages[] = 'Nie podano oprocentowania.';

        if (empty($messages)) {
            if (!is_numeric($amount)) $messages[] = 'Kwota kredytu musi być liczbą.';
            else if ($amount <= 0) $messages[] = 'Kwota kredytu musi być większa od zera.';

            if (!is_numeric($years)) $messages[] = 'Liczba lat musi być liczbą.';
            else if ($years <= 0) $messages[] = 'Liczba lat musi być większa od zera.';

            if (!is_numeric($rate)) $messages[] = 'Oprocentowanie musi być liczbą.';
            else if ($rate < 0) $messages[] = 'Oprocentowanie nie może być ujemne.';
        }
        if (empty($messages) && !\Illuminate\Support\Facades\Auth::check()) {
            if ($amount > 10000) $messages[] = 'Darmowa wersja obsługuje kwoty tylko do 10 000 zł.';
            if ($years > 2) $messages[] = 'Darmowa wersja pozwala na okres maksymalnie 2 lat.';
            if ($rate > 2) $messages[] = 'Darmowa wersja pozwala na maksymalnie 2% oprocentowania.';
        }

        if (empty($messages)) {
            $amount = floatval($amount);
            $years = intval($years);
            $rate = floatval($rate);

            $months = $years * 12;
            $monthlyRate = ($rate / 100) / 12;

            if ($monthlyRate > 0) {
                $calc_result = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$months));
            } else {
                $calc_result = $amount / $months;
            }

            $result = round($calc_result, 2);
        }

        return view('credit.index', [
            'amount' => $amount,
            'years' => $years,
            'rate' => $rate,
            'messages' => $messages,
            'result' => $result
        ]);
    }
}