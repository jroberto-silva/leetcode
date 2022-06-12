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

        $count = 0;

        $values = [];
        $keys = [];

        foreach ($nums as $key => $value) {
            $count++;

            if ($value > $target) {
                break;
            }

            $values[] = $value;
            $keys[] = $key;
        }

        $i = 0;
        $j = $count - 1;

        while (1) {
            $sum = $values[$i] + $values[$j];

            if ($sum == $target) {
                return [$keys[$i], $keys[$j]];
            }

            ($sum < $target) ? $i++ : $j--;
        }
    }
}
