<?php

# jalal7h@gmail.com
# 2017/01/10
# 1.0

function userpanel_menu_items(){
    
    userpanel_fix_do();
    ksort( $GLOBALS['userpanel_item'] );

    foreach ( $GLOBALS['userpanel_item'] as $i => $item ) {
        $items[$i]['func'] = $item[0];
        $items[$i]['func'] = $item[0];
        $items[$i]['name'] = $item[1];
        $items[$i]['icon'] = $item[2];
        $items[$i]['curr_class'] = ( $_REQUEST['do'] == $item[0] ? "current" : "" );
    }

    return $items;

}

