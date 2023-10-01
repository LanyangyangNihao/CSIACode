<?php
/***/

namespace app\api\controller;

use common\util\File;
use think\log;
use think\Image;
use think\Request;
/**
 * Class UeditorController
 * @package admin\Controller
 */
class Ueditor extends Base
{
    private $sub_name = array('date', 'Ymd');
    private $savePath = 'allimg/';
    private $fileExt = 'jpg,png,gif,jpeg,bmp,ico,webp';

    public function __construct()
    {
        parent::__construct();
        exit; // 目前没用到这个api接口
    }
}