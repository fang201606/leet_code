<?php


/**
 * Class Solution
 * 124.二叉树中的最大路径和
 * @link https://leetcode-cn.com/problems/binary-tree-maximum-path-sum/
 */
class Solution
{
    private $max_sum = PHP_INT_MIN;

    /**
     * 递归法
     * @link https://leetcode-cn.com/problems/binary-tree-maximum-path-sum/solution/er-cha-shu-zhong-de-zui-da-lu-jing-he-by-leetcode-/
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSum($root)
    {
        $this->maxSum($root);
        return $this->max_sum;
    }

    private function maxSum(TreeNode $node)
    {
        if ($node == null) {
            return 0;
        }

        // 递归计算左右子节点的最大贡献值
        // 只有在最大贡献值大于0时，才会选取对应子节点
        $left_gain = max($this->maxSum($node->left), 0);
        $right_gain = max($this->maxSum($node->right), 0);

        // 节点的最大路径和取决于该节点的质与该节点的左右节点的最大贡献值
        $price_new_path = $node->val + $left_gain + $right_gain;

        // 更新答案
        $this->max_sum = max($this->max_sum, $price_new_path);

        // 返回该节点的最大贡献值
        return $node->val + max($left_gain, $right_gain);
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
echo $obj->maxPathSum([1, 2, 3]);