<?php

# jalal7h@gmail.com
# 2017/01/23
# 1.1

function userpanel_menu_items(){
    
    userpanel_fix_do();
    ksort( $GLOBALS['userpanel_item'] );
    
    foreach ( $GLOBALS['userpanel_item'] as $i => $array ) {
       
        $item['func'] = $array[0];
        $item['slug'] = $array[1];
        $item['name'] = $array[2];
        $item['icon'] = $array[3];
        $item['default'] = $array[4]; 

        $item['curr_class'] = ( $_REQUEST['do_slug'] == $item['slug'] ? "current" : "" );

        $items[$i] = $item;

    }

    return $items;

}

