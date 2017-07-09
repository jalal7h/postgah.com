<?php

# jalal7h@gmail.com
# 2017/01/04
# 1.0

function is_closure( $t ){

    return is_object($t) && ($t instanceof Closure);

}

