<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.8

class Slug
{

    public static function translate(){

        $URI = substr(_URI, 0, 1) == '/' ? substr(_URI, 1) : _URI;
        list( $URI_DIR, $URI_PAR ) = explode( '?', $URI );

        define( '_URI_DIR', $URI_DIR );
        define( '_URI_PAR', $URI_PAR );

        if( _URI_DIR == '/'  or  _URI_DIR == ''  ){
            // echo _URI_DIR;die();
            return true;
        // } elseif( strstr(_URI, '?') ){
        //     return true;
        
        #
        # file slug
        } else if( self::file() ){
            return true;

        #
        # database slug
        } else if( self::database() ){
            return true;
        
        } else if( query_string_set() == '' ){
            define( '_PAGE', ( $_REQUEST['page'] ? $_REQUEST['page'] : 1 ) );
            d404();

        } else {
            return true;
        }

    }


    private static function file(){
        
        uksort($GLOBALS['slug'], function ($a, $b) {
            return strlen($b)-strlen($a);
        });

        if( sizeof($GLOBALS['slug']) ){
            foreach( $GLOBALS['slug'] as $slug_string => $slug_path ){
                if( $path = self::pattern_matches($slug_string, $slug_path) ){
                    self::pattern_set($path);
                    return true;
                }
            }
        }

        return false;

    }
    

    private static function database(){
        
        $the_slug = _URI_DIR;
        $the_slug = urldecode($the_slug);
        
        if (! $path = table('slug', $the_slug, 'path', 'slug')) {
            return false;
        } else {
            self::pattern_set($path);
            return true;
        }
    }


    private static function pattern_matches($pattern, $path){
        
        # if the first character if /faq is / remove it.
        if (substr($pattern, 0, 1) == '/') {
            $pattern = substr($pattern, 1);
        }

        # replace the $ with reg-exp
        $pattern = str_replace('$', '(.*)', $pattern);
        
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "/" . $pattern . "_END_PATTERN/U";
        $subject = _URI_DIR . "_END_PATTERN";
        
        preg_match_all($pattern, $subject, $matches);
        
        // echo $pattern."<br>";
        // echo $subject."<hr>";
        // var_dump($matches);
        
        if( $matches[0][0] == $subject ){
            for( $i=1; $i<sizeof($matches); $i++ ){
                $path = str_replace('$'.$i, $matches[$i][0], $path);
            }
            return $path;
        
        } else {
            return false;
        }

    }


    private static function pattern_set($path){
        
        if( strstr($path, "?") ){
            $path = explode('?', $path)[1];
        }

        $path = explode('&', $path);

        foreach ($path as $param) {
            if (strstr($param, "=")) {
                list($key, $value) = explode("=", $param);
                // echo "$key ==> $value<br>";
                $_GET[ $key ] = $value;
                $_REQUEST[ $key ] = $value;
            }
        }

    }


    public static function getSlugByURL( $query_string ){
        
        if( $slug = self::getSlugByURLFromFile($query_string) ){
            return $slug;
        
        } elseif( $slug = self::getSlugByURLFromDB($query_string) ){
            return $slug;
        
        } else {
            return false;
        }

    }

    
    private static function getSlugByURLFromFile( $query_string ){

        if (sizeof($GLOBALS['slug'])) {
            foreach ($GLOBALS['slug'] as $slug_pattern => $slug_path) {

                if( substr($slug_path,0,2) == './' ){
                    $slug_path = substr($slug_path,2);
                }

                if( $query_string == $slug_path ){
                    return $slug_pattern;
                }

            }
        }
        
        return false;

    }


    private static function getSlugByURLFromDB( $query_string ){
        
        if (! $rs = dbq(" SELECT `slug` FROM `slug` WHERE `path`='$query_string' LIMIT 1 ")) {
        } elseif (! dbn($rs)) {
        } elseif (! $rw = dbf($rs)) {
        } else {
            return $rw['slug'];
        }

        return false;
    }


    public static function getSlugByName( $name ){
        
        if( $slug = self::getSlugByNameFromFile( $name ) ){
            return $slug;
        
        } else if( $slug = self::getSlugByNameFromDB( $name ) ){
            return $slug;
        
        } else {
            return false;
        }

    }


    public static function getSlugByNameFromFile( $name ){
        
        if( sizeof($GLOBALS['slug_name']) ){
            foreach( $GLOBALS['slug_name'] as $slug_string => $slug_name ){
                if( $slug_name == $name ){
                    return $slug_string;
                }
            }
        }
        
        return false;
        
    }


    private static function getSlugByNameFromDB( $name ){
        
        $array_set = self::getSlugByNameFromDB_load();

        if( array_key_exists($name, $array_set) ){
            return $array_set[ $name ];
        
        } else {
            return false;
        }

    }

    private static function getSlugByNameFromDB_load(){
        
        if(! $GLOBALS[ __FUNCTION__ ] ){
            if( $rs = dbq(" SELECT `name`, `slug` FROM `slug` WHERE 1 ") ){
                while( $rw = dbf($rs) ){
                    $GLOBALS[ __FUNCTION__ ][ $rw['name'] ] = $rw['slug'];
                }
            }
        }

        return $GLOBALS[ __FUNCTION__ ];

    }


    # Slug::set( './?page=3', 'about' );
    public static function set( $path, $slug ){
        
        if( substr($slug, 0, 2) == './' ){
            $slug = substr($slug, 2);
        } elseif (substr($slug, 0, 1) == '/') {
            $slug = substr($slug, 1);
        }

        if (! $rs = dbq(" SELECT * FROM `slug` WHERE `path`='$path' LIMIT 1 ")) {
            e();

        #
        # insert
        } elseif (! dbn($rs)) {
            if(! $path ){
                e();
            } else {
                if(! dbs('slug', [ 'slug'=>$slug, 'path'=>$path, 'name'=>NULL ]) ){
                    e();
                } else {
                    return true;
                }
            }

        #
        # update
        } else if(! dbs('slug', [ 'slug'=>$slug ], [ 'path'=>$path ]) ){
            e();
        } else {
            return true;
        }

        return false;
    }


}







