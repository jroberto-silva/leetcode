<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        $len = strlen($s);

        $digitChars = '0123456789';
        $signalChars = '-+';

        $validChars = ' ' . $signalChars . $digitChars;

        $digits = '';
        $signal = '';

        for ($i = 0; $i < $len; $i++) {
            $currentDigit = $s[$i];

            if (strpos($validChars, $currentDigit) === false) {
                break;
            }

            if ($currentDigit == ' ') {
                if ($signal !== '' || $digits !== '') {
                    break;
                }

                continue;
            }

            $isDigit = strpos($digitChars, $currentDigit) !== false;
            $isSignal = strpos($signalChars, $currentDigit) !== false;

            if ($isSignal) {
                if ($signal !== '' || $digits !== '') {
                    break;
                }

                $signal = $currentDigit;
                continue;
            }

            if (!$isDigit) {
                break;
            }

            $digits .= $currentDigit;
        }

        $digits = $digits ? $digits * 1 : 0;

        if ($signal === '-') {
            $digits *= -1;
        }

        if ($digits < pow(-2, 31)) {
            return pow(-2, 31);
        }

        if ($digits > (pow(2, 31) - 1)) {
            return pow(2, 31) - 1;
        }

        return $digits;
    }
}
