<?

# jalal7h@gmail.com
# 2016/07/18
# 1.0

// in bad az taid e agahi run mishe, age agahi niaz be taid nadasht, bad az setPlan run mishe
function item_plan_duration_orderSettle_setDate( $item_id ){

    $date_start = U();

    # 
    # get item record
    if(! $rw_item = table('item', $item_id) ){
        e();

    #
    # if ads is still not activated, return back.
    } else if( $rw_item['flag'] != 2 ){
        return true;
    
    # 
    # get IPD record - akharin order i k date nadare, va date mikhad
    } else if(! $IPD_id = pgPlan_getItemPlanDuration( $item_id, $still_not_used=true ) ){
        e();
    } else if(! $rw_IPD = table('item_plan_duration', $IPD_id) ){
        e();

    #
    # get PD record
    } else if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
        e();

    #
    # tain e zaman e payan e order
    } else if(! $date_end = $date_start + ($rw_PD['hour'] * 3600) ){
        e();

    #
    # set Dates
    } else if(! dbs(
            'item_plan_duration', 
            [ 
                'date_start' => $date_start, 
                'date_end' => $date_end, 
                'request_for_date'=>'0'
            ], 
            [ 'id'=>$rw_IPD['id'] ]
    ) ){
        e();
    
    } else {

        #
        # sync e plan , alan
        pgPlan_syncItemPlan( $item_id );

        # va sync e plan dar table e `item`, vaghti modat zaman e ye service tamum mishe,
        cronjob_add( 'pgPlan_syncItemPlan', $date_end , $item_id );

        return true;
    }

    return false;
}











