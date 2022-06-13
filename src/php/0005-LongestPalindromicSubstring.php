
<?php

class Solution
{

    function longestPalindrome($s)
    {
        $len = strlen($s);

        $longestLen = 0;
        $longestString = '';

        $maxRight = 0;

        for ($i = 0; $i < $len; $i++) {

            $isPalindrome = false;

            for ($left = $i, $right = $len - 1; $right >= $left; $right--) {
                if ($right - $left < $longestLen || $right == $maxRight) {
                    break;
                }
                
                if ($s[$left] != $s[$right]) {
                    continue;
                }

                $substringLen = $right - $left + 1;

                $substring = substr($s, $left, $substringLen);    
                $reversedSubstring = strrev($substring);

                if ($substring == $reversedSubstring) {
                    $isPalindrome = true;
                    break;
                }
            }

            if ($isPalindrome && $substringLen > $longestLen) {
                $maxRight = $right;

                $longestLen = $substringLen;
                $longestString = $substring;
            }

            if ($longestLen > ($len - $i)) {
                break;
            }
        }

        return $longestString ?: $s[0];
    }
}
