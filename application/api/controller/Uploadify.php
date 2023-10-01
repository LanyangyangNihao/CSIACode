<?php
/***/

namespace app\api\controller;
use common\util\File;
use think\Image;
use think\Request;

class Uploadify extends Base
{
    private $sub_name = array('date', 'Ymd');
    private $savePath = 'allimg/';
    private $image_type = '';
    
    public function __construct()
    {
        parent::__construct();
        exit; // 目前没用到这个api接口
    }
}