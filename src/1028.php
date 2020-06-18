<?php

/**
 * Class Solution
 * 1028.从先序遍历还原二叉树
 * @link https://leetcode-cn.com/problems/recover-a-tree-from-preorder-traversal/
 */
class Solution
{

    /**
     * @param String $S
     * @return TreeNode
     */
    function recoverFromPreorder($S)
    {
        $n = strlen($S);
        $i = 0;
        $stack = [];
        while ($i < $n) {
            $level = 0;
            while ($S[$i] == '-') {
                $level++;
                $i++;
            }
            $value = '';
            while ($i < $n && is_numeric($S[$i])) {
                $value .= $S[$i++];
            }
            $node = new TreeNode(intval($value));
            if ($level == count($stack)) {
                if (!empty($stack)) {
                    end($stack)->left = $node;
                }
            } else {
                while ($level != count($stack)) {
                    array_pop($stack);
                }
                end($stack)->right = $node;
            }
            array_push($stack, $node);
        }


        return $stack[0];
    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}

$obj = new Solution();
$res = $obj->recoverFromPreorder('1-2--3--4-5--6--7');
print_r($res);