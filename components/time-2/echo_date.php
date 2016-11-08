<?

# jalal7h@gmail.com
# 2016/11/08
# 1.0

$GLOBALS['do_action'][] = "echo_date";

function echo_date(){
    echo date("Y/m/d H:i:s", U());
}





