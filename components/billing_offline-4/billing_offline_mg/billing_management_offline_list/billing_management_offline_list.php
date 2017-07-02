<?php

# jalal7h@gmail.com
# 2017/06/06
# 1.2

function billing_management_offline_list()
{
    
    #
    # action
    switch ($_REQUEST['do']) {
        
        case 'remove':
            billing_management_offline_list_remove();
            break;
        
        case 'approve':
            billing_management_offline_list_flag();
            break;

    }

    #
    # list
    # --------------------------------------------
    $list = [
        'head' => ($_REQUEST['archive']==0 ? __('پرداخت‌های تایید نشده') : __('پرداخت‌های تایید شده') ),
        'table' => 'billing_invoice',
        'where' => [ " `transaction`!='' AND `method` LIKE 'manual%' ", " `date`".($_REQUEST['archive']==0 ? '=0' : '>0')." " ],
        'order' => [ 'date_created' => 'desc' ],
        'limit' => 5,
        'url' => [
            'base' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&func2=".$_REQUEST["func2"]."&archive=".$_REQUEST["archive"]',
            'remove' => true,
        ],
        'item' => [
            [ '"<a target=\"_blank\" href=\"".user_mg_detailLink($rw["user_id"])."\" >".user_detail($rw["user_id"])["name"]."</a>"' , 'head'=>__('کاربر') ],
            [ 'billing_format($rw["cost"])', 'head'=>lmtc('billing_invoice:cost') ],
            [ 'billing_method($rw["method"])["c1"]', 'head'=>__('بانک') ],
            [ 'UDate( ( $rw["date"]>0 ? $rw["date"] : explode("::",$rw["transaction"])[1] ) ,"text")', 'head'=>lmtc('billing_invoice:date') ],
            [ '( $rw["date"] ? $rw["transaction"] : explode("::",$rw["transaction"])[0] )', 'head'=>__('شماره تراکنش / سریال') ],
        ],
        'search' => [ 'transaction', 'user(user_id)[name]', 'billing_method(method)[c1]' ],
    ];

    #
    # bank dropdown
    if (! $rs0 = dbq(" SELECT DISTINCT `method` FROM `billing_invoice` WHERE  `date`".($_REQUEST['archive']==0 ? '=0' : '>0')." AND  `method` LIKE 'manual%' ")) {
    } elseif (! dbn($rs0)) {
    } else {
        while ($bank = dbf($rs0)) {
            $methods[ $bank['method'] ] = billing_method($bank['method'])['c1'];
        }

        $list['filter'] = [ 'method' => [ '.. '.__('بانک').' ..', $methods ] ];
    }

    #
    # approve button
    if ($_REQUEST['archive'] == 0) {
        $list['button'] = [
            'approve' => [
                'url'    => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&func2='.$_REQUEST['func2'].'&archive='.$_REQUEST['archive'].'&q='.$_REQUEST['q'].'&method='.$_REQUEST['method'].'&do=approve&id=".$rw["id"]',
                'icon'    => '00c',
                'name'    => __('تایید پرداخت'),
                'color'    => '#179600',
                'text_readytoremove' => __('آیا مایل به تایید این گزارش پرداخت هستید؟'),
            ],
        ];
    }

    echo listmaker_list($list);
    # --------------------------------------------
}
