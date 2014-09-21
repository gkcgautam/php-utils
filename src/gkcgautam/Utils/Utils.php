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
    public static function getHumanReadableFileSize ($bytes)
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
                $result = strval(round($result, 2))." ".$arItem["UNIT"];
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
     * @return file size in KB (2.87 KB)
     */ 
    public static function getFileSizeInKB ($bytes, $decimals=3){
        return round(($bytes/1024), $decimals);
    }

    /** 
     * Converts bytes into MB 
     * 
     * @param string $bytes 
     * @param int $decimals
     * @return file size in KB (2.87 MB)
     */ 
    public static function getFileSizeInMB ($bytes, $decimals=3){
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

}
