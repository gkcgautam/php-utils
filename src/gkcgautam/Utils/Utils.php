<?php

/*
 * @author Gautam Chaudhary <gkcgautam@gmail.com>
 */

namespace gkcgautam\Utils;

/**
 * PHP Utility classes
 *
 * @author Gautam Chaudhary <gkcgautam@gmail.com>
 */
class Utils
{
    const SECONDS_IN_MINUTE = 60;
    const SECONDS_IN_HOUR   = 3600;
    const SECONDS_IN_DAY    = 86400;
    const SECONDS_IN_WEEK   = 604800;
    const SECONDS_IN_MONTH  = 2592000;
    const SECONDS_IN_YEAR   = 31536000;

    /**
     * Check if $string is JSON
     *
     * @param string $string
     * @return boolean
     */
    public static function isJson ($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Check if $string is HTML
     *
     * @param string $string
     * @return boolean
     */
    public static function isHTML ($string)
    {
        return ($string != strip_tags ($string)) ? true: false;
    }

    /**
     * Redirect to a URL
     *
     * @param string $url
     * @param boolean $permanent
     */
    public static function redirect ($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }

    /** 
     * Converts bytes into human readable file size. 
     * Original Source: http://php.net/manual/de/function.filesize.php#112996
     * 
     * @param string $bytes 
     * @return string human readable file size (2.87 МB)
     */ 
    public static function getHumanReadableFileSize ($bytes, $decimals=2)
    {
        $bytes = floatval($bytes);
            $arBytes = array(
                0 => array(
                    "UNIT" => "TB",
                    "VALUE" => pow(1024, 4)
                ),
                1 => array(
                    "UNIT" => "GB",
                    "VALUE" => pow(1024, 3)
                ),
                2 => array(
                    "UNIT" => "MB",
                    "VALUE" => pow(1024, 2)
                ),
                3 => array(
                    "UNIT" => "KB",
                    "VALUE" => 1024
                ),
                4 => array(
                    "UNIT" => "B",
                    "VALUE" => 1
                ),
            );

        foreach($arBytes as $arItem)
        {
            if($bytes >= $arItem["VALUE"])
            {
                $result = $bytes / $arItem["VALUE"];
                $result = strval(round($result, $decimals))." ".$arItem["UNIT"];
                break;
            }
        }
        return $result;
    }

    /** 
     * Converts bytes into KB 
     * 
     * @param string $bytes 
     * @param int $decimals
     * @return float File size in KB (2.87 KB)
     */ 
    public static function getFileSizeInKB ($bytes, $decimals=2)
    {
        return round(($bytes/1024), $decimals);
    }

    /** 
     * Converts bytes into MB 
     * 
     * @param string $bytes 
     * @param int $decimals
     * @return float File size in KB (2.87 MB)
     */ 
    public static function getFileSizeInMB ($bytes, $decimals=2)
    {
        return round(($bytes/(1024*1024)), $decimals);
    }

    /** 
     * Returns Image info
     * 
     * @param string $file Image file path
     * @return array Image Info
     */ 
    public static function getImageInfo ($file)
    {

        list($width, $height, $type, $attr ) = getimagesize($file);

        return array(
            'width' => $width,
            'height' => $height,
            'type' => self::getExtensionFromImageType($type, false),
            'attr' => $attr,
        );
    }

    /** 
     * Returns image extension name from image type
     * Source: http://php.net/manual/ro/function.image-type-to-extension.php#79688
     * 
     * @param int $type 
     * @param boolean $dot
     * @return image extensation (jpg)
     */ 
    public static function getExtensionFromImageType ($type, $dot = false)
    {
        $e = array ( 1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'bmp',
            'tiff', 'tiff', 'jpc', 'jp2', 'jpf', 'jb2', 'swc',
            'aiff', 'wbmp', 'xbm');

        $type = (int)$type;
        if (!$type) {
            return null;
        }

        if ( !isset($e[$type]) ) {
            return null;
        }

        return ($dot ? '.' : '') . $e[$type];
    }

    /** 
     * Returns extension from file name
     * 
     * @param string $file_name 
     * @param boolean $lower_case
     * @return string extensation (txt)
     */ 
    public static function getExtensionFromFileName ($file_name, $lower_case = true)
    {
        $file_name = $lower_case ? strtolower($file_name) : $file_name;

        return pathinfo($file_name, PATHINFO_EXTENSION);
    }

    /** 
     * Returns escaped string if mysqli connection is available
     * 
     * @param string $string 
     * @param boolean $check_connection_availability
     * @return string Escaped String
     */ 
    public static function realEscapeString ($string, $check_connection_availability = false)
    {
        if($check_connection_availability && !mysqli_ping()){
            return $string;
        }

        return mysqli::real_escape_string($string);
    }

    /** 
     * Checks whether all of the params specified are set or not
     * 
     * @param string $method GET or POST
     * @param array $params
     * @return boolean
     */ 
    public static function areParamsSet ($method="POST", $params=array())
    {
        if(!empty($params)){
            foreach ($params as $param) {
                if( ($method=="POST" && !isset($_POST[$param])) || ($method=="GET" && !isset($_GET[$param])) ){
                    return false;
                }
            }
        }
        return true;
    }

    /** 
     * Returns an array containing only the allowed keys
     * 
     * @param array $arr Original Array
     * @param array $keys Allowed Keys
     * @return array Filtered Array
     */ 
    public static function arrayFilterKeys ($arr = array(), $keys=array())
    {
        if(!empty($arr) && !empty($keys)){
            $res = array();
            foreach($keys as $key){
                if(array_key_exists($key, $arr)){
                    $res[$key] = $arr[$key];
                }
            }
            return $res;
        }
        return $arr;
    }

    /** 
     * Returns an array containing filtered sub arrays
     * Uses arrayFilterKeys method for the filteration
     * 
     * @param array $arr Original Array
     * @param array $keys Allowed Keys
     * @return array Filtered Array
     */ 
    public static function subArraysFilterKeys ($arr = array(), $keys=array())
    {
        if(!empty($arr)){
            $res = array();
            foreach($arr as $sub_arr){
                $res[] = self::arrayFilterKeys($sub_arr, $keys);
            }
            return $res;
        }
        return $arr;
    }

    /** 
     * Returns escaped value of a POST param
     * 
     * @param string $key
     * @param boolean $throw_exception
     * @return string
     */
    public static function getEscapedPOST ($key, $throw_exception = true)
    {
        if(isset($_POST[$key]))
            return self::realEscapeString($_POST[$key]);

        if($throw_exception)
            throw new Exception($key." not found in POST");
        else
            return false;
    }

    /** 
     * Returns array of escaped POST params
     * Uses getEscapedPOST method for getting the escaped value
     * 
     * @param array $key_arr
     * @param boolean $throw_exception
     * @return array
     */
    public static function getEscapedArrayPOST ($key_arr = array(), $throw_exception = true)
    {
        $res = array();

        if(!is_array($key_arr) || empty($key_arr))
            return $res;

        foreach ($key_arr as $key) {
            if(!isset($_POST[$key])) {
                if($throw_exception)
                    throw new Exception("Value missing for '$key'");
            } else {
                $res[$key] = self::getEscapedPOST($key, false);
            }
        }
        return $res;
    }

    /** 
     * Checks if date value is valid or not
     * 
     * @param string $date Date value to be checked
     * @param string $format Date format to be expected in $date
     * @return boolean
     */
    public static function isValidDatetime($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /** 
     * Get IP address of visitor
     * 
     * @return string|boolean
     */
    public static function getIPAddress()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return false;
    }

    /** 
     * Returns random value from an array
     * 
     * @param array $array
     * @return mixed
     */
    public static function getRandArrayVal($array)
    {
        return $array[array_rand($array)];
    }

    /** 
     * Returns a random string of specified length
     * 
     * @param int $length
     * @param boolean $include_numbers
     * @return string
     */
    public static function getRandString($length = 10, $include_numbers = true, $include_symbols = false)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($include_numbers){
            $characters .= '0123456789';
        }
        if($include_symbols){
            $characters .= '!@#$%^&*()~_-=+{}[]|:;<>,.?/"\'\\`';
        }

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $str;
    }

    /** 
     * Returns 404 header and die
     */
    public static function die404(){
        header("HTTP/1.0 404 Not Found");
        die();
    }

    /**
     * Checks to see if the page is being server over SSL or not
     *
     * @return boolean
     */
    public static function isHTTPS()
    {
        if ( isset( $_SERVER['HTTPS'] ) && ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {
            return true;
        }
        return false;
    }

    /**
     * Truncate a string to a specified length without cutting a word off.
     * Soure: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1599
     *
     * @param   string  $string  The string to truncate
     * @param   integer $length  The length to truncate the string to
     * @param   string  $append  Text to append to the string IF it gets
     *                           truncated, defaults to '...'
     * @return  string
     */
    public static function safeTruncate( $string, $length, $append = '...' )
    {
        $ret = substr($string, 0, $length);
        $last_space = strrpos($ret, ' ');

        if($last_space !== FALSE && $string != $ret) {
            $ret = substr($ret, 0, $last_space);
        }

        if($ret != $string) {
            $ret .= $append;
        }

        return $ret;
    }

    /**
     * Transmit headers that force a browser to display the download file
     * dialog. Cross browser compatible. Only fires if headers have not
     * already been sent.
     * Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1262
     *
     * @param string $filename The name of the filename to display to
     *                         browsers
     * @param string $content  The content to output for the download.
     *                         If you don't specify this, just the
     *                         headers will be sent
     * @return boolean
     */
    public static function forceDownload( $filename, $content = FALSE )
    {
        if ( ! headers_sent() ) {
            // Required for some browsers
            if ( ini_get( 'zlib.output_compression' ) ) {
                @ini_set( 'zlib.output_compression', 'Off' );
            }

            header( 'Pragma: public' );
            header( 'Expires: 0' );
            header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );

            // Required for certain browsers
            header( 'Cache-Control: private', FALSE );

            header( 'Content-Disposition: attachment; filename="' . basename( str_replace( '"', '', $filename ) ) . '";' );
            header( 'Content-Type: application/force-download' );
            header( 'Content-Transfer-Encoding: binary' );

            if ( $content ) {
               header( 'Content-Length: ' . strlen( $content ) );
            }

            ob_clean();
            flush();

            if ( $content ) {
                echo $content;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Return the URL to a user's gravatar.
     * Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1403
     *
     * @param   string  $email The email of the user
     * @param   integer $size  The size of the gravatar
     * @return  string
     */
    public static function getGravatar( $email, $size = 32 )
    {
        if ( self::isHTTPS() ) {
            $url = 'https://secure.gravatar.com/';
        } else {
            $url = 'http://www.gravatar.com/';
        }

        $url .= 'avatar/' . md5( $email ) . '?s=' . (int) abs( $size );

        return $url;
    }

    /**
     * Converts a unix timestamp to a relative time string, such as "3 days ago"
     * or "2 weeks ago".
     * Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L974
     *
     * @param  int    $from   The date to use as a starting point
     * @param  int    $to     The date to compare to, defaults to now
     * @param  string $suffix The string to add to the end, defaults to " ago"
     * @return string
     */
    public static function getHumanTimeDiff( $from, $to = '', $as_text = FALSE, $suffix = ' ago' )
    {
        if ( $to == '' ) {
            $to = time();
        }

        $from = new \DateTime( date( 'Y-m-d H:i:s', $from ) );
        $to   = new \DateTime( date( 'Y-m-d H:i:s', $to ) );
        $diff = $from->diff( $to );

        if ( $diff->y > 1 ) {
            $text = $diff->y . ' years';
        } else if ( $diff->y == 1 ) {
            $text = '1 year';
        } else if ( $diff->m > 1 ) {
            $text = $diff->m . ' months';
        } else if ( $diff->m == 1 ) {
            $text = '1 month';
        } else if ( $diff->d > 7 ) {
            $text = ceil( $diff->d / 7 ) . ' weeks';
        } else if ( $diff->d == 7 ) {
            $text = '1 week';
        } else if ( $diff->d > 1 ) {
            $text = $diff->d . ' days';
        } else if ( $diff->d == 1 ) {
            $text = '1 day';
        } else if ( $diff->h > 1 ) {
            $text = $diff->h . ' hours';
        } else if ( $diff->h == 1 ) {
            $text = ' 1 hour';
        } else if ( $diff->i > 1 ) {
            $text = $diff->i . ' minutes';
        } else if ( $diff->i == 1 ) {
            $text = '1 minute';
        } else if ( $diff->s > 1 ) {
            $text = $diff->s . ' seconds';
        } else {
            $text = '1 second';
        }

        if ( $as_text ) {
            $text = explode( ' ', $text, 2 );
            $text = self::number_to_word( $text[0] ) . ' ' . $text[1];
        }

        return trim( $text ) . $suffix;
    }

    /**
     * Sets the headers to prevent caching for the different browsers.
     *
     * Different browsers support different nocache headers, so several
     * headers must be sent so that all of them get the point that no
     * caching should occur
     * Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1307
     *
     * @return boolean
     */
    public static function noCacheHeaders()
    {
        if ( ! headers_sent() ) {
            header( 'Expires: Wed, 11 Jan 1984 05:00:00 GMT' );
            header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
            header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
            header( 'Pragma: no-cache' );

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Transmit UTF-8 content headers if the headers haven't already been sent.
     * Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1239
     *
     * @param  string  $content_type The content type to send out
     * @return boolean
     */
    public static function utf8Headers( $content_type = 'text/html' )
    {
        if ( ! headers_sent() ) {
            header( 'Content-type: ' . $content_type . '; charset=utf-8' );

            return TRUE;
        } else {
            return FALSE;
        }
    }

}
