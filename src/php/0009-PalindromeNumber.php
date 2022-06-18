<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0) {
            return false;
        }

        $currentValue = $x;

        while ($currentValue !== 0) {
            $lastDigit = ($currentValue % 10);
            $currentValue = ($currentValue - $lastDigit) / 10;

            $result = $result * 10 + $lastDigit;
        }

        return $result == $x;
    }

    public function isPalindromeWithStringConvert($x)
    {
        if ($x < 0) {
            return false;
        }

        $x = (string) $x;
        $len = strlen($x);

        for ($i = 0; $i < ($len / 2); $i++) {
            if ($x[$i] != $x[$len - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}
