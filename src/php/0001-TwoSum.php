<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        asort($nums);

        $values = array_values($nums);
        $keys = array_keys($nums);

        $i = 0;
        $j = count($nums) - 1;

        while (($sum = $values[$i] + $values[$j]) != $target) {
            ($sum < $target) ? $i++ : $j--;
        }

        return [$keys[$i], $keys[$j]];
    }
}
