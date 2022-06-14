
<?php

class Solution
{
    private function findLongestPalindromeLen($s, $left, $right, $previousLongestLen)
    {
        while (1) {
            for ($i = $left, $j = $right; $i < $j && $s[$i] == $s[$j]; $i++, $j--) { }

            /**
             * If $i >= $j, so palindrome verification ended
             */
            if ($i >= $j) {
                break;
            }

            /**
             * If final $j (right unmatched char) pos - initial left pos was < $previousLongestLen, 
             * it is no longer necessary to check, as you cannot have a palindrome greater than the previous one
             */
            if ($j - $left < $previousLongestLen) {
                return 0;
            }

            $right--;
        }

        return $right - $left + 1;
    }

    function longestPalindrome($s)
    {
        $len = strlen($s);

        $left = 0;
        $longestLen = 0;

        for ($i = 0; $i < $len; $i++) {

            $palindromeLen = $this->findLongestPalindromeLen($s, $i, $len - 1, $longestLen);

            if ($palindromeLen > $longestLen) {
                $left = $i;
                $longestLen = $palindromeLen;
            }

            if ($longestLen > ($len - $i)) {
                break;
            }
        }

        return $longestLen ? substr($s, $left, $longestLen) : $s[0];
    }
}
