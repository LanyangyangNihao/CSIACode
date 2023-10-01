<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 易而优团队 by 陈风任 <491085389@qq.com>
 * Date: 2021-01-14
 */

namespace app\admin\model;
use think\Model;
use think\Page;
use think\Config;
use think\Db;
use app\common\logic\ShopCommonLogic;

/**
 * 商品退换货服务数据模型
 */
class ShopOrderService extends Model
{
    //初始化
    protected function initialize()
    {
        // 需要调用`Model`的`initialize`方法
        parent::initialize();
        // 会员表
        $this->users_db = Db::name('users');
        // 订单主表
        $this->shop_order_db = Db::name('shop_order');
        // 订单明细表
        $this->shop_order_details_db = Db::name('shop_order_details');
        // 订单退换明细表
        $this->shop_order_service_db = Db::name('shop_order_service');
        // 订单退换服务记录表
        $this->shop_order_service_log_db = Db::name('shop_order_service_log');
        // common商城业务层，前后台共用
        $this->shop_common = new ShopCommonLogic();
    }

    // 读取所有退换货服务信息处理返回
    public function GetAllServiceInfo($param = [], $isMerchant = false)
    {   
        // 初始化数组和条件
        $Return = [];
        $where = [
            'a.merchant_id' => !empty($isMerchant) ? ['>', 0] : 0
        ];

        // 订单号查询
        $order_code = !empty($param['order_code']) ? trim($param['order_code']) : '';
        if (!empty($order_code)) $where['a.order_code|a.product_name|a.refund_code'] = array('LIKE', "%{$order_code}%");
        
        // 支付方式查询
        $pay_name = input('pay_name/s', '');
        $Return['pay_name'] = $pay_name;
        if (!empty($pay_name)) $where['c.pay_name'] = $pay_name;

        // 订单下单终端查询
        $order_terminal = input('order_terminal/d', 0);
        $Return['order_terminal'] = $order_terminal;
        if (!empty($order_terminal)) $where['c.order_terminal'] = $order_terminal;
        
        // 查询类型
        $queryStatus = input('queryStatus/d', 0);
        if (!empty($queryStatus) && 1 === intval($queryStatus)) {
            $where['a.status'] = ['IN', [1]];
        } else if (!empty($queryStatus) && 2 === intval($queryStatus)) {
            $where['a.status'] = ['IN', [2, 4, 5, 6]];
        } else if (!empty($queryStatus) && 3 === intval($queryStatus)) {
            $where['a.status'] = ['IN', [7]];
        }

        // 商品类型查询
        // $contains_virtual = input('contains_virtual/d');
        // if (!empty($contains_virtual)) $where['b.prom_type'] = 10 == $contains_virtual ? 0 : $contains_virtual;

        if (!empty($isMerchant)) {
            // 时间检索条件
            $add_time = input('add_time/s', '');
            if (!empty($add_time)) {
                $add_time = explode('~', $add_time);
                $begin = strtotime(rtrim($add_time[0]));
                $finish = strtotime(rtrim($add_time[1]));
                $where['a.add_time'] = ['between', "$begin, $finish"];
            }
        } else {
            // 时间检索条件
            $begin = strtotime(input('param.add_time_begin/s'));
            $end = input('param.add_time_end/s');
            !empty($end) && $end .= ' 23:59:59';
            $end = strtotime($end);
            // 时间检索
            if ($begin > 0 && $end > 0) {
                $where['a.add_time'] = array('between', "$begin, $end");
            } else if ($begin > 0) {
                $where['a.add_time'] = array('egt', $begin);
            } else if ($end > 0) {
                $where['a.add_time'] = array('elt', $end);
            }
        }

        $count = $this->shop_order_service_db->alias('a')->join('__SHOP_ORDER_DETAILS__ b', 'a.details_id = b.details_id', 'LEFT')->join('__SHOP_ORDER__ c', 'a.order_id = c.order_id', 'LEFT')->where($where)->count('a.service_id');
        $pageObj = new Page($count, config('paginate.list_rows'));

        /*查询退换货订单信息*/
        if (!empty($isMerchant)) {
            $Service = $this->shop_order_service_db->alias('a')
                ->field('a.*, b.product_price, b.num, c.order_status, c.order_amount, d.merchant_name')
                ->join('__SHOP_ORDER_DETAILS__ b', 'a.details_id = b.details_id', 'LEFT')
                ->join('__SHOP_ORDER__ c', 'a.order_id = c.order_id', 'LEFT')
                ->join('__WEAPP_MULTI_MERCHANT__ d', 'a.merchant_id = d.merchant_id', 'LEFT')
                ->limit($pageObj->firstRow.','.$pageObj->listRows)
                ->where($where)
                ->order('a.service_id desc')
                ->select();
        } else {
            $Service = $this->shop_order_service_db->alias('a')
                ->field('a.*, b.product_price, b.num, c.order_status, c.order_amount')
                ->join('__SHOP_ORDER_DETAILS__ b', 'a.details_id = b.details_id', 'LEFT')
                ->join('__SHOP_ORDER__ c', 'a.order_id = c.order_id', 'LEFT')
                ->limit($pageObj->firstRow.','.$pageObj->listRows)
                ->where($where)
                ->order('a.service_id desc')
                ->select();
        }
        $DetailsID = get_arr_column($Service, 'details_id');
        /* END */

        // /*查询订单数据*/
        // $field_new = 'b.details_id, b.product_price, b.num, a.shipping_fee, a.order_total_num';
        // $where_new = [
        //     'b.apply_service' => 1,
        //     'b.details_id' => ['IN', $DetailsID]
        // ];
        // $OrderData = $this->shop_order_db->alias('a')
        //     ->field($field_new)
        //     ->join('__SHOP_ORDER_DETAILS__ b', 'a.order_id = b.order_id', 'LEFT')
        //     ->where($where_new)
        //     ->getAllWithIndex('details_id');
        // /* END */
        
        // 手机端后台管理插件特定使用参数
        $isMobile = input('param.isMobile/d', 0);
        // 获取商品前台URL
        $Archives = get_archives_data($Service, 'product_id');
        foreach ($Service as $key => $value) {
            // 添加时间
            $Service[$key]['add_time'] = date('Y-m-d H:i:s', $value['add_time']);

            // 商品封面图
            $Service[$key]['product_img'] = handle_subdir_pic(get_default_pic($value['product_img']));

            // 商品前台URL
            $Service[$key]['arcurl'] = get_arcurl($Archives[$value['product_id']]);

            // 商品规格，组合数据
            $value['product_spec'] = explode('&lt;br/&gt;', $value['product_spec']);
            $valueData = '';
            foreach ($value['product_spec'] as $key_1 => $value_1) {
                $delimiter = '';//!empty($isMobile) ? '；' : '';
                if (!empty($value_1)) $valueData .= '<span>' . trim(strrchr($value_1, '：'),'：') . '</span>' . $delimiter;
            }
            $Service[$key]['product_spec'] = $valueData;
            // $Service[$key]['product_spec'] = rtrim(trim(str_replace("&lt;br/&gt;", " || ", $value['product_spec'])), '||');

            /* 计算退还金额 */
            // $DetailsData = $OrderData[$value['details_id']];
            // $product_total_price = sprintf("%.2f", $DetailsData['product_price'] * (string)$DetailsData['num']);
            // $Service[$key]['product_total_price'] = $product_total_price > 0 ? $product_total_price : $Service[$key]['refund_price'];
            
            if (1 == $value['service_type']) {
                $Service[$key]['ShippingFee'] = $Service[$key]['refund_price'] = '0.00';
            } else if (2 == $value['service_type']) {
                // 运费计算
                $ShippingFee = 0;
                $Service[$key]['ShippingFee'] = $ShippingFee;
                // if (!empty($DetailsData['shipping_fee'])) {
                //     $ShippingFee = sprintf("%.2f", ($DetailsData['shipping_fee'] / (string)$DetailsData['order_total_num']) * (string)$value['product_num']);
                //     $Service[$key]['ShippingFee'] = $ShippingFee;
                // }
                // 计算退还金额
                $ProductPrice = 0;
                if (!empty($value['product_price'])) {
                    $ProductPrice = sprintf("%.2f", ($value['product_price'] * (string)$value['num']) - $ShippingFee);
                    $Service[$key]['refund_price'] = $ProductPrice;
                }
            }
            /* END */
        }

        $Return['Service'] = $Service;
        $Return['pageObj'] = $pageObj;
        $Return['pageStr'] = $pageObj->show();
        return $Return;
    }

    public function GetFieldServiceInfo($service_id = null)
    {
        // 手机端后台管理插件特定使用参数
        $isMobile = input('param.isMobile/d', 0);

        $Return = [];
        if (empty($service_id)) return $Return;
        
        // 退换货信息
        $Service[0] = $this->shop_order_service_db->where('service_id', $service_id)->find();
        $array_new = get_archives_data($Service, 'product_id');
        $Service = $Service[0];

        $Service['arcurl'] = get_arcurl($array_new[$Service['product_id']]);
        $Service['StatusName'] = Config::get('global.order_service_status')[$Service['status']];
        $Service['product_img'] = handle_subdir_pic(get_default_pic($Service['product_img']));
        $Service['TypeName'] = Config::get('global.order_service_type')[$Service['service_type']];
        $Service['product_num'] = (string)$Service['product_num'];
        $Service['add_time'] = date('Y-m-d H:i:s', $Service['add_time']);
        $Service['upload_img'] = !empty($Service['upload_img']) ? explode(',', $Service['upload_img']) : [];
        if (!empty($Service['upload_img'])) unset($Service['upload_img'][count($Service['upload_img']) - 1]);
        $Service['audit_time'] = !empty($Service['audit_time']) ? date('Y-m-d H:i:s', $Service['audit_time']) : 0;
        $Service['update_time'] = !empty($Service['update_time']) ? date('Y-m-d H:i:s', $Service['update_time']) : 0;
        $Service['manual_time'] = !empty($Service['manual_time']) ? date('Y-m-d H:i:s', $Service['manual_time']) : 0;
        $Service['status_text'] = Config::get('global.order_service_status')[$Service['status']];
        $Service['service_type_text'] = Config::get('global.order_service_type')[$Service['service_type']];
        $Service['users_delivery'] = !empty($Service['users_delivery']) ? unserialize($Service['users_delivery']) : [];
        $Service['admin_delivery'] = !empty($Service['admin_delivery']) ? unserialize($Service['admin_delivery']) : [];
        if (!empty($Service['admin_delivery']['time'])) {
            $Service['admin_delivery']['time'] = date('Y-m-d H:i:s', $Service['admin_delivery']['time']);
        }
        $Service['actual_price'] = floatval($Service['actual_price']) > 0 ? floatval($Service['actual_price']) : floatval($Service['refund_price']);

        // 商品规格，组合数据
        $Service['product_spec'] = explode('&lt;br/&gt;', $Service['product_spec']);
        $valueData = '';
        foreach ($Service['product_spec'] as $key_1 => $value_1) {
            $delimiter = '';//!empty($isMobile) ? '；' : '';
            if (!empty($value_1)) $valueData .= '<span>' . trim(strrchr($value_1, '：'),'：') . '</span>' . $delimiter;
        }
        $Service['product_spec'] = $valueData;

        // 查询订单数据
        $where = [
            'order_id' => $Service['order_id'],
        ];
        $Order = $this->shop_order_db->where($where)->find();
        // 订单类型
        if (empty($Order['prom_type'])) {
            $Order['prom_type_order'] = '普通订单';
            $Order['delivery_type_show'] = '物流配送';
        } else if (1 == $Order['prom_type']) {
            $Order['prom_type_order'] = '虚拟订单';
            $Order['delivery_type_show'] = '无需物流';
        } else if (2 == $Order['prom_type']) {
            $Order['prom_type_order'] = '核销订单';
            $Order['delivery_type_show'] = '到店自提';
            $Order['verify'] = Db::name('shop_order_verify')->where('id',$Order['verify_id'])->find();
        }
        // 订单来源
        $Order['order_terminal_show'] = '电脑端';
        if (!empty($Order['order_terminal']) && 2 === intval($Order['order_terminal'])) {
            $Order['order_terminal_show'] = '手机端';
        } else if (!empty($Order['order_terminal']) && 3 === intval($Order['order_terminal'])) {
            $Order['order_terminal_show'] = '微信小程序';
        }
        // 收获地址省市区县
        $Order['city'] = get_city_name($Order['city']);
        $Order['district'] = get_area_name($Order['district']);
        $Order['province'] = get_province_name($Order['province']);
        // 备注条数
        $Order['admin_note_count'] = !empty($Order['admin_note']) ? count(unserialize($Order['admin_note'])) : 0;
        // 获取订单方式名称
        $Order['pay_name_show'] = !empty($Order['pay_name']) ? Config::get('global.pay_method_arr')[$Order['pay_name']] : '微信支付';

        // 查询订单数据
        $where = [
            'order_id' => $Service['order_id'],
            'details_id' => $Service['details_id'],
            'apply_service' => 1
        ];
        $Details = $this->shop_order_details_db->where($where)->find();
        // 商品类型
        if (empty($Details['prom_type'])) {
            $Details['prom_type_goods'] = '实物商品';
        } else if (4 == $Details['prom_type']) {
            $Details['prom_type_goods'] = '核销商品';
        } else {
            $Details['prom_type_goods'] = '虚拟商品';
        }
        $Details['product_img'] = !empty($Details['litpic']) ? get_default_pic($Details['litpic']) : '';
        $Details['product_subtotal'] = sprintf("%.2f", floatval($Details['product_price']) * floatval($Details['num']));
        // 规格处理
        $detailsData = !empty($Details['data']) ? unserialize($Details['data']) : [];
        $productSpec = !empty($detailsData['product_spec']) ? explode('；', $detailsData['product_spec']) : '';
        $specData = '';
        foreach ($productSpec as $value) {
            if (!empty($value)) $specData .= '<span>' . $value . '</span>';
        }
        $Details['product_spec'] = $specData;

        // 查询所属订单下有多少个商品
        $where = [
            'users_id' => intval($Service['users_id']),
            'order_id' => intval($Service['order_id']),
        ];
        $goodsCount = $this->shop_order_details_db->where($where)->count();
        // 查询所属订单下有多少个已完成维权的商品
        $where = [
            'status' => ['IN', [6, 7]],
            'users_id' => intval($Service['users_id']),
            'order_id' => intval($Service['order_id']),
        ];
        $applyCount = $this->shop_order_service_db->where($where)->count();
        // 计算维权是否为本次商品订单中的最后一个维权商品
        $Service['last_one'] = 1 === intval(intval($goodsCount) - intval($applyCount)) ? 1 : 0;

        // 用户发货后计算退还金额、余额
        if (5 == $Service['status'] || 7 == $Service['status'] || 2 == $Service['service_type']) {
            // 订单总数
            // $Order['order_total_num'] = (string)$Order['order_total_num'];

            // 运费计算
            $ShippingFee = 0;
            $Service['ShippingFee'] = $ShippingFee;
            // if (!empty($Order['shipping_fee'])) {
            //     $ShippingFee = sprintf("%.2f", ($Order['shipping_fee'] / $Order['order_total_num']) * $Service['product_num']);
            //     $Service['ShippingFee'] = $ShippingFee;
            // }

            // 退回应付款
            $ProductPrice = 0;
            if (!empty($Details['product_price'])) {
                $ProductPrice = sprintf("%.2f", ($Details['product_price'] * $Service['product_num']) - $ShippingFee);
                $Service['refund_price'] = $ProductPrice;
            }
        } else {
            $Service['refund_price'] = '0.00';
        }
        $Service['shipping_fee']  = $ShippingFee;

        // 会员信息
        $Users = $this->users_db->find($Service['users_id']);
        $Users['nickname'] = empty($Users['nickname']) ? $Users['username'] : $Users['nickname'];
        $Users['head_pic'] = get_head_pic($Users['head_pic'], false, $Users['sex']);

        // 服务记录表信息
        $Log = $this->shop_order_service_log_db->order('log_id desc')->where('service_id', $Service['service_id'])->select();
        foreach ($Log as $key => $value) {
            $value['add_time'] = date('Y-m-d H:i:s', $value['add_time']);
            if (!empty($value['users_id'])) {
                if (intval($value['users_id']) === intval($Service['users_id'])) {
                    $value['name'] = '会员：'.$Users['nickname'];
                } else {
                    // 商家操作
                    $value['name'] = '商家：'.Db::name('users')->where('users_id', $value['users_id'])->getField('username');
                }
            } else if (!empty($value['admin_id'])) {
                $value['name'] = '商家：'.getAdminInfo(session('admin_id'))['user_name'];
            }
            $Log[$key] = $value;
        }

        // 返回
        $Return['Log']     = $Log;
        $Return['Users']   = $Users;
        $Return['Order']   = $Order;
        $Return['Details'] = $Details;
        $Return['Service'] = $Service;
        return $Return;
    }

    // 读取所有退换货服务信息处理返回
    public function GetUserAllServiceInfo($param = [])
    {
        // 手机端后台管理插件特定使用参数
        $isMobile = input('param.isMobile/d', 0);

        // 初始化数组和条件
        $Return  = $where =[];
        $where['a.service_type'] = 2;
        $where['a.status'] = 7;

        // 订单号查询
        $order_code = !empty($param['order_code']) ? trim($param['order_code']) : '';
        if (!empty($order_code)) $where['a.order_code|a.product_name'] = array('LIKE', "%{$order_code}%");
        if (!empty($param['users_id'])) $where['a.users_id'] = $param['users_id'];

        $count = $this->shop_order_service_db->alias('a')->join('__SHOP_ORDER_DETAILS__ b', 'a.details_id = b.details_id', 'LEFT')->join('__SHOP_ORDER__ c', 'a.order_id = c.order_id', 'LEFT')->where($where)->count('a.service_id');
        $pageObj = new Page($count, config('paginate.list_rows'));

        /*查询退换货订单信息*/
        $Service = $this->shop_order_service_db->alias('a')
            ->field('a.*, b.product_price, b.num')
            ->join('__SHOP_ORDER_DETAILS__ b', 'a.details_id = b.details_id', 'LEFT')
            ->join('__SHOP_ORDER__ c', 'a.order_id = c.order_id', 'LEFT')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->where($where)
            ->order('a.service_id desc')
            ->select();
        $Archives = get_archives_data($Service, 'product_id');
        foreach ($Service as $key => $value) {
            // 添加时间
            $Service[$key]['add_time'] = date('Y-m-d H:i:s', $value['add_time']);

            // 商品封面图
            $Service[$key]['product_img'] = handle_subdir_pic(get_default_pic($value['product_img']));

            // 商品前台URL
            $Service[$key]['arcurl'] = get_arcurl($Archives[$value['product_id']]);

            // 商品规格，组合数据
            $value['product_spec'] = explode('&lt;br/&gt;', $value['product_spec']);
            $valueData = '';
            foreach ($value['product_spec'] as $key_1 => $value_1) {
                $delimiter = '';//!empty($isMobile) ? '；' : '';
                if (!empty($value_1)) $valueData .= '<span>' . trim(strrchr($value_1, '：'),'：') . '</span>' . $delimiter;
            }
            $Service[$key]['product_spec'] = $valueData;

            if (1 == $value['service_type']) {
                $Service[$key]['ShippingFee'] = $Service[$key]['refund_price'] = '0.00';
            } else if (2 == $value['service_type']) {
                // 运费计算
                $ShippingFee = 0;
                $Service[$key]['ShippingFee'] = $ShippingFee;
                // 计算退还金额
                $ProductPrice = 0;
                if (!empty($value['product_price'])) {
                    $ProductPrice = sprintf("%.2f", ($value['product_price'] * (string)$value['num']) - $ShippingFee);
                    $Service[$key]['refund_price'] = $ProductPrice;
                }
            }
            /* END */
        }

        $Return['Service'] = $Service;
        $Return['pageObj'] = $pageObj;
        $Return['pageStr'] = $pageObj->show();

        return $Return;
    }

    // 售后服务处理(维权订单处理)
    public function afterServiceHandle($post = [])
    {
        // 更新指定的维权订单
        $times = getTime();
        $where = [
            'users_id' => $post['users_id'],
            'order_id' => $post['order_id'],
            'details_id' => $post['details_id'],
            'service_id' => $post['service_id'],
            'product_id' => $post['product_id']
        ];
        $update = [
            'update_time' => $times,
            'status' => intval($post['status'])
        ];
        // 存在商家发货信息则执行
        if (!empty($post['delivery'])) {
            $post['delivery']['time'] = $times;
            $update['admin_delivery'] = serialize($post['delivery']);
        }
        // 存在退款备注则执行
        if (!empty($post['refund_remark'])) {
            $update['refund_remark'] = htmlspecialchars($post['refund_remark']);
        }
        // 同意申请、拒接申请时写入审核时间
        if (in_array($post['status'], [2])) $update['audit_time'] = $times;
        if (in_array($post['status'], [3, 8])) $update['audit_time'] = 0;

        // 执行更新
        $resultID = $this->shop_order_service_db->where($where)->update($update);

        // 更新后续操作
        if (!empty($resultID)) {
            // 退款到余额
            if (7 === intval($post['status']) && 1 === intval($post['refund_way']) && in_array($post['service_type'], [2, 3])) {
                // 执行退回余额
                $where = [
                    'users_id' => $post['users_id']
                ];
                $update = [
                    'users_money' => Db::raw('users_money+'.($post['actual_price'])),
                    'update_time' => $times
                ];
                $resultID = $this->users_db->where($where)->update($update);
                if (!empty($resultID)) {
                    if (empty($post['order_code'])) {
                        $post['order_code'] = $this->shop_order_db->where('order_id', $post['order_id'])->getField('order_code');
                    }
                    // 添加余额记录
                    UsersMoneyRecording($post['order_code'], $post, $post['actual_price'], '商品退款维权结束');
                }
            }

            // 拒接申请、关闭维权时更新订单商品为可申请售后
            if (in_array($post['status'], [3, 8, 9])) {
                $where = [
                    'users_id' => $post['users_id'],
                    'order_id' => $post['order_id'],
                    'details_id' => $post['details_id'],
                    'product_id' => $post['product_id']
                ];
                $update = [
                    'apply_service' => 0,
                    'update_time' => $times
                ];
                $this->shop_order_details_db->where($where)->update($update);
            }

            // 如果维权结束且最后一个维权订单则将订单更新为已关闭(仅针对待发货和待收货的订单，已完成订单不做处理)
            if (7 === intval($post['status']) && !empty($post['last_one']) && in_array($post['order_status'], [1, 2])) {
                $where = [
                    'users_id' => $post['users_id'],
                    'order_id' => $post['order_id'],
                ];
                $update = [
                    'update_time' => $times,
                    'order_status' => -1,
                ];
                $isUpdate = $this->shop_order_db->where($where)->update($update);
                // 添加订单操作记录
                if (!empty($isUpdate)) AddOrderAction($post['order_id'], 0, session('admin_id'), -1, 1, 1, '订单关闭', '维权完成，订单自动关闭！');
            }

            // 售后服务手动完成服务单并自行退款
            if (in_array($post['status'], [6, 7]) && 0 === intval($post['is_refund']) && 1 === intval($post['manual_refund'])) {
                $where = [
                    'users_id' => $post['users_id'],
                    'service_id' => $post['service_id']
                ];
                $update = [
                    'manual_refund' => 1,
                    'refund_note' => trim($post['refund_note']),
                    'update_time' => getTime(),
                ];
                $this->shop_order_service_db->where($where)->update($update);
            }

            // 维权记录
            $this->shop_common->AddOrderServiceLog($post, 0);

            return true;
        } else {
            return false;
        }
    }
}