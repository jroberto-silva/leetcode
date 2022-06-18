<?php

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $result = 0;

        while ($x !== 0) {
            $lastDigit = ($x % 10);
            $x = ($x - $lastDigit) / 10;

            $result = $result * 10 + $lastDigit;
        }

        if ($result < pow(-2, 31) || $result > pow(2, 31) - 1) {
            return 0;
        }

        return $result;
    }
}
