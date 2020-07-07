<?php

/**
 * Class Solution
 * 112. 路径总和
 * @link https://leetcode-cn.com/problems/path-sum/
 */
class Solution
{
    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum)
    {
        if ($root == null) {
            return false;
        }
        if ($root->left == null && $root->right == null) {
            return $sum == $root->val;
        }
        return $this->hasPathSum($root->left, $sum - $root->val) || $this->hasPathSum($root->right, $sum - $root->val);
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

$a = new TreeNode(7);
$a1 = new TreeNode(2);
$a2 = new TreeNode(1);
$b = new TreeNode(11);
$b->left = $a;
$b->right = $a1;
$b1 = new TreeNode(13);
$b2 = new TreeNode(4);
$b2->right = $a2;
$c = new TreeNode(4);
$c->left = $b;
$c1 = new TreeNode(8);
$c1->left = $b1;
$c1->right = $b2;
$d = new TreeNode(5);
$d->left = $c;
$d->right = $c1;


$obj = new Solution();
$res = $obj->hasPathSum($d, 22);
var_dump($res);
