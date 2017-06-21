<?

# jalal7h@gmail.com
# 2016/07/18
# 1.0

function item_plan_duration_orderSettle_setPlan( $rw_item, $rw_IPD ){

    # 
    # get PD row
    if(! $rw_PD = table('plan_duration', $rw_IPD['plan_duration_id']) ){
        return e();
    
    # 
    # get plan row
    } else if(! $rw_plan = table('plan', $rw_PD['plan_id']) ){
        return e();
    }

    # 
    # age revoke hast, revoke ro anjam bedim
    if( $rw_IPD['type_of_request']=='ReplaceRevoke' ){
        
        if(! $current_working_IPD_id = pgPlan_getItemPlanDuration( $rw_item['id'] ) ){
            e();
            
        } else if(! dbs( 'item_plan_duration', [ 'revokedBy'=>$rw_IPD['id'] ], ['id'=>$current_working_IPD_id] ) ){
            e();
        
        } else {
            # texty needed for ReplaceRevoke
        }
        
    #
    # NewUpgrade
    } else {
        // kare khasi baraye upgrade nadarim felan
    }
    
    # 
    # setPlan in `item_plan_duration`
    if(! dbs( 
        'item_plan_duration', 
        [ 'flag'=>'1' , 'request_for_date'=>'1' ], 
        [ 'id'=>$rw_IPD['id'] ]
    ) ){
        return e();
        
    } else {
        return true;
    }

}



