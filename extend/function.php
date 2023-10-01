<?php
/***/

// 用户自定义函数文件，函数名必须以 diy_ 前缀开头，避免与官方函数冲突报错

if (!function_exists('diy_number_format')) {
    /**
     * 将价格格式还原为普通价格
     */
    function diy_number_format($price = '')
    {
        $price = str_replace(',', '', $price);
        $price = preg_replace('/^(\d+)\.00/i', '${1}', $price);
        return $price;
    }
}