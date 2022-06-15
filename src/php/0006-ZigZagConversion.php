
<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1) {
            return $s;
        }

        $len = strlen($s);
        $result = '';

        $columnIncrement = ($numRows - 1) * 2;

        for ($i = 0; $i < $numRows; $i++) {

            $intermediateIncrement = $columnIncrement - $i * 2;

            for ($j = $i; $j < $len; $j += $columnIncrement) {
                $result .= $s[$j];

                $intermdiateIndex = $j + $intermediateIncrement;

                if ($intermediateIncrement > 0 && $intermediateIncrement < $columnIncrement && $intermdiateIndex < $len) {
                    $result .= $s[$intermdiateIndex];
                }
            }
        }

        return $result;
    }
}

// Points I notice:
// 1. In "zigzag" text, we can imagine the down movement as a "column";
// 2. In each row the "distance" between the columns will be the same: DISTANCE_BETWEEN = (numRows - 1) * 2;
// 3. In each row we can have only ONE char BETWEEN two columns;
// 4. The position of this "intermediate" char will be: PREVIOUS CHAR  INDEX, AT THE SAME ROW  + (DISTANCE_BETWEEN - (ROW_INDEX * 2)).


// 0
// 1 3
// 2

//  P       A       H       N
//  A   P   L   S   I   I   G
//  Y       I       R

// p            i           n
// a        l   s       i   g
// y    a       h   r
// p            i

// 0     6              12          18          24
// 1   5 7        11    13      17  19      23  25
// 2 4   8   10         14  16      20  22      26
// 3     9              15          21                      

// 0                8
// 1            7   9
// 2        6       10
// 3    5           11
// 4                12

// 0                    10
// 1                9   11              19
// 2            8       12          18
// 3        7           13      17
// 4    6               14  16
// 5                    15

// 1                            15                          29                          43
// 2                        14  16                      28  30                      42
// 3                    13      17                  27      31                  41
// 4                12          18              26          32              40
// 5            11              19          25              33          39
// 6        10                  20      24                  34      38
// 7    9                       21  23                      35  37
// 8                            22                          36
