<?php

/**
 * Class Solution
 * 108. 将有序数组转换为二叉搜索树
 * @link https://leetcode-cn.com/problems/convert-sorted-array-to-binary-search-tree/
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        return $this->helper($nums, 0, count($nums) - 1);
    }

    private function helper($nums, $left, $right)
    {
        if ($left > $right) {
            return null;
        }
        $mid = ceil(($left + $right) / 2);
        $root = new TreeNode($nums[$mid]);
        $root->left = $this->helper($nums, $left, $mid - 1);
        $root->right = $this->helper($nums, $mid + 1, $right);
        return $root;
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
$res = $obj->sortedArrayToBST([-10, -3, 0, 5, 9]);
print_r($res);