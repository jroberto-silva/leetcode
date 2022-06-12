
<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $resultList = new ListNode(0);
        $currentNodeResult = $resultList;

        while ($l1 != null || $l2 != null) {
            $nodeValue = $currentNodeResult->val + ($l1->val ?? 0) + ($l2->val ?? 0) ;
            
            $currentNodeResult->val = $nodeValue % 10;

            $l1 = $l1->next ?? null;
            $l2 = $l2->next ?? null;

            if (($l1 != null || $l2 != null) || $nodeValue >= 10) {
                $currentNodeResult->next = new ListNode((int)($nodeValue / 10));
            }

            $currentNodeResult = $currentNodeResult->next;
        }

        return $resultList;
    }
}
