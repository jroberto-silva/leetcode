<?php

class Solution
{
    private const MATCH_SYMBOL_ANY = '.';
    private const MATCH_SYMBOL_REPEAT = '*';

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($string, $pattern)
    {
        if (strlen($string) == 0 && strlen($pattern) == 0) {
            return true;
        }
        
        $char = $string[0] ?? null;

        $charPattern = $pattern[0] ?? null;
        $nextCharPattern = $pattern[1] ?? null;

        $match = ($char !== null && ($char == $charPattern || $charPattern == self::MATCH_SYMBOL_ANY));

        if ($match) {         
            if ($nextCharPattern != self::MATCH_SYMBOL_REPEAT && $this->isMatch(substr($string, 1), substr($pattern, 1))) {
                return true;
            }

            if ($nextCharPattern == self::MATCH_SYMBOL_REPEAT && $this->isMatch(substr($string, 1), $pattern)) {
                return true;
            }
        }

        if ($nextCharPattern == self::MATCH_SYMBOL_REPEAT && $this->isMatch($string, substr($pattern, 2))) {
            return true;
        }

        return false;
    }
}
