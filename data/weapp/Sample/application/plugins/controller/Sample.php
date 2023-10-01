<?php
/***/

namespace app\plugins\controller;

use think\Db;

class Sample extends Base
{
    /**
     * 构造方法
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * index
     */
    public function index()
    {
        return $this->fetch();
    }
}