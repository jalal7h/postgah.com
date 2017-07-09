<?php

# jalal7h@gmail.com
# 2017/05/14
# 1.0

if(! function_exists('imagecrop') ){

	function imagecrop($src, array $rect){

        $dest = imagecreatetruecolor($rect['width'], $rect['height']);
        imagecopy(
            $dest,
            $src,
            0,
            0,
            $rect['x'],
            $rect['y'],
            $rect['width'],
            $rect['height']
        );

        return $dest;

    }

}




