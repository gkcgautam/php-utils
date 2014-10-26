gkcgautam\phpUtils\Utils
===============

PHP Utility classes




* Class name: Utils
* Namespace: gkcgautam\phpUtils



Constants
----------


### SECONDS_IN_MINUTE

```
const SECONDS_IN_MINUTE = 60
```





### SECONDS_IN_HOUR

```
const SECONDS_IN_HOUR = 3600
```





### SECONDS_IN_DAY

```
const SECONDS_IN_DAY = 86400
```





### SECONDS_IN_WEEK

```
const SECONDS_IN_WEEK = 604800
```





### SECONDS_IN_MONTH

```
const SECONDS_IN_MONTH = 2592000
```





### SECONDS_IN_YEAR

```
const SECONDS_IN_YEAR = 31536000
```







Methods
-------


### isJson

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::isJson()(string $string)
```

Check if $string is JSON



* Visibility: **public**
* This method is **static**.

#### Arguments

* $string **string**



### isHTML

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::isHTML()(string $string)
```

Check if $string is HTML



* Visibility: **public**
* This method is **static**.

#### Arguments

* $string **string**



### redirect

```
mixed gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::redirect()(string $url, boolean $permanent)
```

Redirect to a URL



* Visibility: **public**
* This method is **static**.

#### Arguments

* $url **string**
* $permanent **boolean**



### getHumanReadableFileSize

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getHumanReadableFileSize()(string $bytes, integer $decimals)
```

Converts bytes into human readable file size.

Original Source: http://php.net/manual/de/function.filesize.php#112996

* Visibility: **public**
* This method is **static**.

#### Arguments

* $bytes **string**
* $decimals **integer**



### getFileSizeInKB

```
float gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getFileSizeInKB()(string $bytes, integer $decimals)
```

Converts bytes into KB



* Visibility: **public**
* This method is **static**.

#### Arguments

* $bytes **string**
* $decimals **integer**



### getFileSizeInMB

```
float gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getFileSizeInMB()(string $bytes, integer $decimals)
```

Converts bytes into MB



* Visibility: **public**
* This method is **static**.

#### Arguments

* $bytes **string**
* $decimals **integer**



### getImageInfo

```
array gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getImageInfo()(string $file)
```

Returns Image info



* Visibility: **public**
* This method is **static**.

#### Arguments

* $file **string** - &lt;p&gt;Image file path&lt;/p&gt;



### getExtensionFromImageType

```
\gkcgautam\phpUtils\image gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getExtensionFromImageType()(integer $type, boolean $dot)
```

Returns image extension name from image type
Source: http://php.net/manual/ro/function.image-type-to-extension.php#79688



* Visibility: **public**
* This method is **static**.

#### Arguments

* $type **integer**
* $dot **boolean**



### getExtensionFromFileName

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getExtensionFromFileName()(string $file_name, boolean $lower_case)
```

Returns extension from file name



* Visibility: **public**
* This method is **static**.

#### Arguments

* $file_name **string**
* $lower_case **boolean**



### realEscapeString

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::realEscapeString()(string $string, boolean $check_connection_availability)
```

Returns escaped string if mysqli connection is available



* Visibility: **public**
* This method is **static**.

#### Arguments

* $string **string**
* $check_connection_availability **boolean**



### areParamsSet

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::areParamsSet()(string $method, array $params)
```

Checks whether all of the params specified are set or not



* Visibility: **public**
* This method is **static**.

#### Arguments

* $method **string** - &lt;p&gt;GET or POST&lt;/p&gt;
* $params **array**



### arrayFilterKeys

```
array gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::arrayFilterKeys()(array $arr, array $keys)
```

Returns an array containing only the allowed keys



* Visibility: **public**
* This method is **static**.

#### Arguments

* $arr **array** - &lt;p&gt;Original Array&lt;/p&gt;
* $keys **array** - &lt;p&gt;Allowed Keys&lt;/p&gt;



### subArraysFilterKeys

```
array gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::subArraysFilterKeys()(array $arr, array $keys)
```

Returns an array containing filtered sub arrays
Uses arrayFilterKeys method for the filteration



* Visibility: **public**
* This method is **static**.

#### Arguments

* $arr **array** - &lt;p&gt;Original Array&lt;/p&gt;
* $keys **array** - &lt;p&gt;Allowed Keys&lt;/p&gt;



### getEscapedPOST

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getEscapedPOST()(string $key, boolean $throw_exception)
```

Returns escaped value of a POST param



* Visibility: **public**
* This method is **static**.

#### Arguments

* $key **string**
* $throw_exception **boolean**



### getEscapedArrayPOST

```
array gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getEscapedArrayPOST()(array $key_arr, boolean $throw_exception)
```

Returns array of escaped POST params
Uses getEscapedPOST method for getting the escaped value



* Visibility: **public**
* This method is **static**.

#### Arguments

* $key_arr **array**
* $throw_exception **boolean**



### isValidDatetime

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::isValidDatetime()(string $date, string $format)
```

Checks if date value is valid or not



* Visibility: **public**
* This method is **static**.

#### Arguments

* $date **string** - &lt;p&gt;Date value to be checked&lt;/p&gt;
* $format **string** - &lt;p&gt;Date format to be expected in $date&lt;/p&gt;



### getIPAddress

```
string|boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getIPAddress()()
```

Get IP address of visitor



* Visibility: **public**
* This method is **static**.



### getRandArrayVal

```
mixed gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getRandArrayVal()(array $array)
```

Returns random value from an array



* Visibility: **public**
* This method is **static**.

#### Arguments

* $array **array**



### getRandString

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getRandString()(integer $length, boolean $include_numbers, boolean $include_symbols)
```

Returns a random string of specified length



* Visibility: **public**
* This method is **static**.

#### Arguments

* $length **integer**
* $include_numbers **boolean**
* $include_symbols **boolean**



### die404

```
mixed gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::die404()()
```

Returns 404 header and die



* Visibility: **public**
* This method is **static**.



### makeDir

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::makeDir()(string $path, integer $permission, boolean $recursive)
```

Creates a directory



* Visibility: **public**
* This method is **static**.

#### Arguments

* $path **string**
* $permission **integer**
* $recursive **boolean**



### deleteFile

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::deleteFile()(string $path, boolean $success_if_file_not_found)
```

Deletes a file



* Visibility: **public**
* This method is **static**.

#### Arguments

* $path **string**
* $success_if_file_not_found **boolean**



### isHTTPS

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::isHTTPS()()
```

Checks to see if the page is being server over SSL or not



* Visibility: **public**
* This method is **static**.



### safeTruncate

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::safeTruncate()(string $string, integer $length, string $append)
```

Truncate a string to a specified length without cutting a word off.

Soure: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1599

* Visibility: **public**
* This method is **static**.

#### Arguments

* $string **string** - &lt;p&gt;The string to truncate&lt;/p&gt;
* $length **integer** - &lt;p&gt;The length to truncate the string to&lt;/p&gt;
* $append **string** - &lt;p&gt;Text to append to the string IF it gets&lt;/p&gt;
&lt;pre&gt;&lt;code&gt;                      truncated, defaults to &#039;...&#039;&lt;/code&gt;&lt;/pre&gt;



### forceDownload

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::forceDownload()(string $filename, string $content)
```

Transmit headers that force a browser to display the download file
dialog. Cross browser compatible. Only fires if headers have not
already been sent.

Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1262

* Visibility: **public**
* This method is **static**.

#### Arguments

* $filename **string** - &lt;p&gt;The name of the filename to display to
                        browsers&lt;/p&gt;
* $content **string** - &lt;p&gt;The content to output for the download.&lt;/p&gt;
&lt;pre&gt;&lt;code&gt;                    If you don&#039;t specify this, just the
                    headers will be sent&lt;/code&gt;&lt;/pre&gt;



### getGravatar

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getGravatar()(string $email, integer $size)
```

Return the URL to a user's gravatar.

Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1403

* Visibility: **public**
* This method is **static**.

#### Arguments

* $email **string** - &lt;p&gt;The email of the user&lt;/p&gt;
* $size **integer** - &lt;p&gt;The size of the gravatar&lt;/p&gt;



### getHumanTimeDiff

```
string gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::getHumanTimeDiff()(integer $from, integer $to, boolean $as_text, string $suffix)
```

Converts a unix timestamp to a relative time string, such as "3 days ago"
or "2 weeks ago".

Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L974

* Visibility: **public**
* This method is **static**.

#### Arguments

* $from **integer** - &lt;p&gt;The date to use as a starting point&lt;/p&gt;
* $to **integer** - &lt;p&gt;The date to compare to, defaults to now&lt;/p&gt;
* $as_text **boolean**
* $suffix **string** - &lt;p&gt;The string to add to the end, defaults to &quot; ago&quot;&lt;/p&gt;



### noCacheHeaders

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::noCacheHeaders()()
```

Sets the headers to prevent caching for the different browsers.

Different browsers support different nocache headers, so several
headers must be sent so that all of them get the point that no
caching should occur
Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1307

* Visibility: **public**
* This method is **static**.



### utf8Headers

```
boolean gkcgautam\phpUtils\Utils::\gkcgautam\phpUtils\Utils::utf8Headers()(string $content_type)
```

Transmit UTF-8 content headers if the headers haven't already been sent.

Source: https://github.com/brandonwamboldt/utilphp/blob/2bd3b7989d9c617b49a190c65dcd192d9c47d755/src/utilphp/util.php#L1239

* Visibility: **public**
* This method is **static**.

#### Arguments

* $content_type **string** - &lt;p&gt;The content type to send out&lt;/p&gt;


