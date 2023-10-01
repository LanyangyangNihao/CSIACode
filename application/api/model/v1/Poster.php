<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 陈风任 <491085389@qq.com>
 * Date: 2022-03-10
 */

namespace app\api\model\v1;

use think\Db;
use think\Cache;
use Grafika\Color;
use Grafika\Grafika;
require_once './vendor/grafika/src/autoloader.php';

/**
 * 微信小程序商品海报模型
 */
load_trait('controller/Jump');

class Poster extends Base
{
    use \traits\controller\Jump;

    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();

        $this->aid = 0;
        $this->typeid = 0;
        $this->channel = 1;
        $this->product = [];
        $this->postData = [];
        $this->posterPath = '';
        $this->posterImage = '';
        $this->appletsQrcode = [];
    }

    // 商品海报生成处理
    // $appletsType: 1=开源小程序，2=可视化小程序
    public function getCreateGoodsShareQrcodePoster($post = [], $channel = 1, $appletsType = 1)
    {
        // 商品ID
        $this->aid = $post['aid'];
        // 商品栏目ID
        $this->typeid = $post['typeid'];
        // 分销商会员ID
        $this->usersID = $post['users_id'];
        // 分销商ID
        $this->dealerID = $post['dealer_id'];
        // 模型ID
        $this->channel = $channel;
        // 图片、海报保存目录
        $this->posterPath = UPLOAD_PATH . 'tmp/poster_' . $this->typeid . '_' . $this->aid . '/';
        // 存在 分销商会员ID 和 分销商ID 则执行
        if (!empty($this->usersID) && !empty($this->dealerID)) {
            $this->posterPath = UPLOAD_PATH . 'tmp/poster_' . $this->typeid . '_' . $this->aid . '_' . $this->usersID . '_' . $this->dealerID . '/';
        }
        // 背景图片处理
        if (1 == $this->channel) {
            $this->posterImage = './public/static/common/images/article-bg.png';
        } else if (2 == $this->channel) {
            $this->posterImage = './public/static/common/images/product-bg.png';
        }
        // 获取商品信息
        $this->product = $this->getProductData();

        // 生成小程序二维码需携带参数
        if (1 === intval($appletsType)) {
            $page = 'pages/archives/product/view';
        } else if (2 === intval($appletsType)) {
            $page = 'pages/article/view';
        } else {
            $page = 'pages/index/index';
        }
        $scene = 'aid=' . $this->aid . '&typeid=' . $this->typeid;
        // 存在 分销商会员ID 和 分销商ID 则执行
        if (!empty($this->usersID) && !empty($this->dealerID)) {
            $scene .= '&u_id=' . $this->usersID . '&d_id=' . $this->dealerID;
        }
        $width = '430';
        $this->postData = compact('page', 'scene', 'width');

        // 小程序二维码处理
        $this->appletsQrcode = $this->getAppletsQrcode();

        // 组合并返回商品分享海报图片
        return $this->getProductSharePosterImage();
    }

    // 返回已处理的商品信息
    private function getProductData()
    {
        // 查询商品信息
        $where['aid'] = $this->aid;
        $field = 'aid, title, litpic, users_price, seo_description';
        $Product = Db::name("archives")->where($where)->field($field)->find();

        if (!empty($Product)) {
            // 商品图片处理
            $ProductLitpic = $this->get_default_pic($Product['litpic'], true);
            // 保存图片的完整路径
            $LitpicSavePath = $this->posterPath . 'product_' . md5($this->aid . $this->typeid) . '.png';
            // 若文件夹不存在则创建
            !is_dir($this->posterPath) && tp_mkdir($this->posterPath);

            // 图片保存到文件处理
            $ch = curl_init($ProductLitpic);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_BINARYTRANSFER,true);
            // https请求 不验证证书和hosts
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);   //重要,源文件链接带https的话就必须使用
            curl_setopt($ch,CURLOPT_TIMEOUT,60);

            $img = curl_exec($ch);
            curl_close($ch);
            $fp = fopen($LitpicSavePath, 'w');
            fwrite($fp, $img);
            fclose($fp);
            // 返回数据
            $Product['litpic'] = $LitpicSavePath;

            return $Product;
        } else {
            $this->error('商品不存在');
        }
    }

    // 返回已处理的小程序二维码
    private function getAppletsQrcode()
    {
        // 保存图片的完整路径
        $qrcodeSavePath = $this->posterPath . 'qrcode_' . md5($this->aid . $this->typeid) . '.png';

        // 若文件夹不存在则创建
        !is_dir($this->posterPath) && tp_mkdir($this->posterPath);

        // 是否配置小程序信息
        $appletsToken = get_weixin_access_token(true);
        if (empty($appletsToken['code'])) {
            return [
                'status' => false,
                'msg' => $appletsToken['msg'],
            ];
        }

        // 调用微信接口获取小程序二维码
        return $this->getWeChatAppletsQrcode($appletsToken['access_token'], $qrcodeSavePath);
    }

    // 返回微信小程序商品详情页二维码
    private function getWeChatAppletsQrcode($accessToken = null, $qrcodeSavePath = null)
    {
        // 获取微信小程序二维码
        $postUrl = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=" . $accessToken;
        $appletsQrcode = httpRequest($postUrl, 'POST', json_encode($this->postData, JSON_UNESCAPED_UNICODE));
        $is_fail = strpos($appletsQrcode,"errcode");
        // 保存图片，保存成功则返回图片路径
        if ($is_fail != false){   //报错
            $error_msg = json_decode($appletsQrcode,true);
            $result = [
                'status' => false,
                'errcode' => $error_msg['errcode'],
                'errmsg' => '获取二维码失败，'.$error_msg['errcode'].":".$error_msg['errmsg'],
            ];
        } else if (@file_put_contents($qrcodeSavePath, $appletsQrcode)) {
            $result = [
                'status' => true,
                'qrcode' => $qrcodeSavePath,
            ];
        } else {
            $result = [
                'status' => false,
                'errcode' => 10000,
                'errmsg' => '获取二维码失败，请重试',
            ];
        }

        return $result;
    }

    // 返回商品分享海报图片
    private function getProductSharePosterImage()
    {
        $Grafika = new Grafika;
        $editor = $Grafika::createEditor(['Gd']);
        // 打开海报背景图
        $editor->open($backdropImage, $this->posterImage);
        // 打开商品图片
        $editor->open($ProductLitpic, $this->product['litpic']);
        // 重设商品图片宽高
        $editor->resizeExact($ProductLitpic, 690, 690);
        // 商品图片添加到背景图
        $editor->blend($backdropImage, $ProductLitpic, 'normal', 1.0, 'top-left', 30, 30);

        // 字体文件路径
        $fontPath = Grafika::fontsDir() . '/' . 'st-heiti-light.ttc';
        // 商品名称处理换行
        $fontSize = 30;
        $productName = $this->wrapText($fontSize, 0, $fontPath, $this->product['title'], 680, 2);
        // 写入商品名称
        $editor->text($backdropImage, $productName, $fontSize, 30, 750, new Color('#333333'), $fontPath);

        //写入商品价格
        if (1 == $this->channel) {
            // 字体文件路径
            $fontPath = Grafika::fontsDir() . '/' . 'st-heiti-light.ttc';
            // 文档描述处理换行
            $fontSize = 20;
            $seoDescription = $this->wrapText($fontSize, 0, $fontPath, $this->product['seo_description'], 500, 4);
            // 写入文档描述
            $editor->text($backdropImage, $seoDescription, $fontSize, 30, 920, new Color('#333333'), $fontPath);
        } else if (2 == $this->channel) {
            $editor->text($backdropImage, $this->product['users_price'], 38, 62, 964, new Color('#ff4444'));
        }

        // 打开小程序码
        if (!empty($this->appletsQrcode['status'])){
            $editor->open($qrcodeImage, $this->appletsQrcode['qrcode']);
            // 重设小程序码宽高
            $editor->resizeExact($qrcodeImage, 140, 140);
            // 小程序码添加到背景图
            $editor->blend($backdropImage, $qrcodeImage, 'normal', 1.0, 'top-left', 570, 914);

            // 保存商品海报
            $posterImageName = 'product_poster_' . md5($this->aid . $this->typeid) . '.png';
            $posterImagePath = $this->posterPath . $posterImageName;
            $editor->save($backdropImage, $posterImagePath);

            // 返回商品海报
            $posterImagePath = request()->domain() . ROOT_DIR . '/' . $posterImagePath;
            return [
                'name' => $posterImageName,
                'path' => $this->posterPath,
                'poster' => $posterImagePath
            ];
        } else {
            return $this->appletsQrcode;
        }
    }

    // 处理文字超出长度自动换行
    private function wrapText($fontsize, $angle, $fontface, $string, $width, $max_line = null)
    {
        // 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
        $content = "";
        // 将字符串拆分成一个个单字 保存到数组 letter 中
        $letter = [];
        for ($i = 0; $i < mb_strlen($string, 'UTF-8'); $i++) {
            $letter[] = mb_substr($string, $i, 1, 'UTF-8');
        }
        $line_count = 0;
        foreach ($letter as $l) {
            $testbox = imagettfbbox($fontsize, $angle, $fontface, $content . ' ' . $l);
            // 判断拼接后的字符串是否超过预设的宽度
            if (($testbox[2] > $width) && ($content !== "")) {
                $line_count++;
                if ($max_line && $line_count >= $max_line) {
                    $content = mb_substr($content, 0, -1, 'UTF-8') . "...";
                    break;
                }
                $content .= "\n";
            }
            $content .= $l;
        }
        return $content;
    }
}