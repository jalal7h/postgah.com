<?php

# jalal7h@gmail.com
# 2017/07/25
# 1.0

# rrqs == Round Ring Query String

function toggle( $name, $title, $default=null, $rrqs=false ){
  
  if( $default === null ){
    $default = $_REQUEST[ $name ];
  }

  if( $attr ){
    foreach ($attr as $k => $v) {
      $attr_str.= " $k=\"$v\"";
    }
  }

  return '
  <label class="toggle_w">
    <span class="switch">
      <input type="checkbox" name="'.$name.'" value="1"'.
        ( $default ? ' checked="checked"' : '' ).
        ( $rrqs ? ' rrqs="1"' : '' ).' >
      <span class="slider round"></span>
    </span>
    <span class="text">'.$title.'</span>
  </label>
  ';

}

