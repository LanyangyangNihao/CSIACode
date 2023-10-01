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
 * Date: 2019-1-7
 */

namespace app\common\model;

use think\Db;
use think\Cache;
use think\Config;

/**
 * 商城公共处理模型
 */
class ShopPublicHandle
{

    // 商品购买确认页 -- 其他逻辑公共调用方法，部分逻辑改动不适合直接修改原文件时请在此方法做处理和兼容
    public function goodsBuyPagePublicHandle($resultData = [])
    {
        // 其他特殊处理和兼容
        // ...........

        // 返回数据
        return $resultData;
    }

    // 订单提交处理 -- 其他逻辑公共调用方法，部分逻辑改动不适合直接修改原文件时请在此方法做处理和兼容
    public function orderSubmitPublicHandle($orderData = [], $usersConfig = [], $usersID = 0, $post = [], $list = [])
    {
        // 如果后台【商城中心】-【商城配置】-【订单设置】-收货后可维权时间设置为0，则表示订单不允许申请维权，反之允许申请维权
        $orderData['allow_service'] = empty($usersConfig['order_right_protect_time']) ? 1 : 0;

        // 获取消费获得积分数据
        $orderData['obtain_scores'] = getConsumObtainScores($orderData, $usersConfig, true);
        $orderData['is_obtain_scores'] = !empty($orderData['obtain_scores']) ? 0 : 1;

        // 订单结算分佣的分销商信息处理
        $userInfo = GetUsersLatestData($usersID);

        // 如果安装了分销插件则执行
        if (is_dir('./weapp/DealerPlugin/')) {
            // 开启分销插件则执行
            $data = model('Weapp')->getWeappList('DealerPlugin');
            if (!empty($data['status']) && 1 == $data['status']) {
                // 调用分销逻辑层方法
                $dealerCommonLogic = new \weapp\DealerPlugin\logic\DealerCommonLogic;
                $orderData = $dealerCommonLogic->dealerOrderHandle($orderData, $userInfo);
            }
        }

        // 返回数据
        return $orderData;
    }

    // 订单支付完成处理 -- 其他逻辑公共调用方法，部分逻辑改动不适合直接修改原文件时请在此方法做处理和兼容
    public function orderPayCompletePublicHandle($post = [], $userInfo = [], $notify = false, $shopOrder = [], $resultData = [], $goodsList = [])
    {
        // 其他特殊处理和兼容
        // ...........
    }

    // 处理会员折扣价返回
    public function handleUsersDiscountPrice($aid = 0, $level_id = 0)
    {
        // 会员折扣价
        $usersDiscountPrice = 0;
        // 查询会员折扣价列表
        $discountList = Db::name('product_users_discount')->where('aid', $aid)->getAllWithIndex('level_id');

        // 检测是否存在会员折扣价，没有则直接返回原数据
        if (!empty($discountList[$level_id])) {
            $usersDiscountPrice = !empty($discountList[$level_id]['users_discount_price']) ? floatval($discountList[$level_id]['users_discount_price']) : 0;
        }
        // 返回数据
        return $usersDiscountPrice;
    }

    // 获取会员折扣价格模板
    public function getUsersDiscountPriceTpl($aid = 0, $usersPrice = 0)
    {
        // 查询会员级别列表
        $usersLevelList = model('UsersLevel')->getList();
        if (empty($usersLevelList)) return ['code' => 0, 'data' => '请先在[会员中心]-[会员级别]中添加会员级别！'];

        // 如果存在产品ID则查询是否已指定会员级别
        $discountList = !empty($aid) ? Db::name('product_users_discount')->where('aid', $aid)->getAllWithIndex('level_id') : [];

        // 生成模板返回
        $resultTpl = $this->createUsersDiscountPriceTpl($usersLevelList, $discountList, $usersPrice);

        return ['code' => 1, 'data' => $resultTpl];
    }

    // 获取会员折扣价格模板
    public function saveUsersDiscountPriceList($usersDiscount = [], $aid = 0)
    {
        // 处理折扣价列表
        $insertAll = [];
        $times = getTime();
        $productUsersDiscount = Db::name('product_users_discount');
        $discount_ids = !empty($usersDiscount['id']) ? $usersDiscount['id'] : [];
        $discount_prices = !empty($usersDiscount['price']) ? $usersDiscount['price'] : [];
        $discount_level_ids = !empty($usersDiscount['level_id']) ? $usersDiscount['level_id'] : [];
        if (!empty($discount_level_ids[0])) {
            foreach ($discount_level_ids as $key => $value) {
                if (!empty($value)) {
                    // 编辑
                    if (!empty($discount_ids[$key])) {
                        $update = [
                            'users_discount_id' => intval($discount_ids[$key]),
                            'aid' => intval($aid),
                            'level_id' => intval($value),
                            'users_discount_price' => !empty($discount_prices[$key]) ? floatval($discount_prices[$key]) : 0,
                            'update_time' => $times,
                        ];
                        $productUsersDiscount->update($update);
                    }
                    // 新增
                    else {
                        $insertAll[] = [
                            'aid' => intval($aid),
                            'level_id' => intval($value),
                            'users_discount_price' => !empty($discount_prices[$key]) ? floatval($discount_prices[$key]) : 0,
                            'add_time' => $times,
                            'update_time' => $times,
                        ];
                    }
                }
            }
        }
        
        // 存在新增的会员折扣价则执行添加
        !empty($insertAll) && $productUsersDiscount->insertAll($insertAll);
    }

    // 生成模板返回
    private function createUsersDiscountPriceTpl($usersLevelList = [], $discountList = [], $usersPrice = 0)
    {
        $trTpl = '';
        $usersDiscountPrice = !empty($usersPrice) ? floatval($usersPrice) : floatval(0);
        foreach ($usersLevelList as $key => $value) {
            // 会员折扣列表
            $discountFind = !empty($discountList[$value['level_id']]) ? $discountList[$value['level_id']] : [];
            $usersDiscountID = !empty($discountFind['users_discount_id']) ? intval($discountFind['users_discount_id']) : 0;
            $usersDiscountPrice = !empty($discountFind['users_discount_price']) ? floatval($discountFind['users_discount_price']) : floatval($usersPrice);
            // 模板拼装
            $trTpl .= <<<EOF
<tr>
    <input type="hidden" name="users_discount[id][]" value="{$usersDiscountID}">
    <input type="hidden" name="users_discount[level_id][]" value="{$value['level_id']}">
    <td style='padding: 10px !important; width: 200px;'>
        <b style='font-weight: normal; color: #333;'>{$value['level_name']}</b>
    </td>
    <td style='padding: 10px !important;'>
        <input type='text' class='users_discount_price' name="users_discount[price][]" value="{$usersDiscountPrice}" onpaste='this.value=this.value.replace(/[^\d.]/g, "");' onkeyup='this.value=this.value.replace(/[^\d.]/g, "");'>&nbsp;元
    </td>
</tr>
EOF;
        }
        // 模板拼装
        $resultTpl = <<<EOF
<table class='table table-bordered' border='1' cellpadding='10' cellspacing='10' style='border: 1px solid #ddd;'>
    <thead>
        <tr>
            <td style='padding: 10px !important; width: 200px;'><b style='font-weight: normal; color: #333;'>会员级别</b></td>
            <td style='padding: 10px !important; width: 200px;'><b style='font-weight: normal; color: #333;'>会员价格</b> &nbsp; <a href="javascript:void(0);" onclick="bulkSetUsersDiscountPrice(this);" >批量设置 </a></td>
        </tr>
    </thead>
    <tbody>
        {$trTpl}
    </tbody>
</table>
EOF;
        return $resultTpl;
    }
}