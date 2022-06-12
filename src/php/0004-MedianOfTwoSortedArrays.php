
<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $countArray1 = count($nums1);
        $countArray2 = count($nums2);

        $mergedArray = $this->merge($nums1, $nums2, $countArray1, $countArray2);

        $middle = ($countArray1 + $countArray2) / 2;

        if (($countArray1 + $countArray2) % 2 == 1) {
            return $mergedArray[floor($middle)];
        }

        return ($mergedArray[$middle - 1] + $mergedArray[$middle]) / 2;
    }

    private function merge($nums1, $nums2, $count1, $count2)
    {
        if ($count1 == 0) {
            return $nums2;
        }

        if ($count2 == 0) {
            return $nums1;
        }

        $mergedArray = [];

        for ($i = 0, $j = 0; $i < $count1 && $j < $count2;) {
            $mergedArray[] = ($nums1[$i] <= $nums2[$j]) ? $nums1[$i++] : $nums2[$j++];
        }

        for (; $i < $count1; $i++) {
            $mergedArray[] = $nums1[$i];
        }

        for (; $j < $count2; $j++) {
            $mergedArray[] = $nums2[$j];
        }

        return $mergedArray;
    }
}
