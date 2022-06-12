<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $len = strlen($s);
        
        $charMap = [];

        $longest = 0;
        $currentLen = 0;

        for ($i = 0; $i < $len; $i++) {

            if (!isset($charMap[$s[$i]])) {
                $charMap[$s[$i]] = $i;
                $currentLen++;

                if ($currentLen > $longest) {
                    $longest = $currentLen;
                }

                continue;
            }

            $removedCount = 0;

            while (1) {
                $char = key($charMap);

                unset($charMap[$char]);
                $removedCount++;

                if ($char == $s[$i]) {
                    break;
                }
            }

            $charMap[$s[$i]] = $i;
            $currentLen = $currentLen - $removedCount + 1;
        }

        return $longest;
    }
}
