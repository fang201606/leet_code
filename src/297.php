<?php

/**
 * Class Codec
 * 297.二叉树的序列化与反序列化
 * @link https://leetcode-cn.com/problems/serialize-and-deserialize-binary-tree/
 */
class Codec
{
    function __construct()
    {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root)
    {
        return serialize($root);
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        return unserialize($data);
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


$root = new TreeNode(12);
$obj = new Codec();
$data = $obj->serialize($root);
$ans = $obj->deserialize($data);