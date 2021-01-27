<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*All Tabels */

define('TBL_ADMIN', 'admin_user');
define('TBL_USER', 'users');
define('TBL_SLIDER', 'slider');
define('TBL_CATEGORY', 'category');
define('TBL_SUB_CATEGORY', 'sub_category');
define('TBL_BRAND', 'brand');
define('TBL_COURIERS', 'couriers');
define('TBL_SIZE', 'size');
define('TBL_PRODUCT', 'product');
define('TBL_PRODUCT_IMG', 'product_img');
define('TBL_PRODUCT_SIZE', 'product_size');
define('TBL_PRODUCT_BRAND', 'product_brand');
define('TBL_PRODUCT_COLOR', 'product_color');
define('TBL_APP_BANNER', 'app_banner');
define('TBL_BANNER', 'banner');
define('TBL_COLOR', 'color');
define('TBL_WISHLIST', 'wishlist');
define('TBL_REVIEW', 'review');
define('TBL_REVIEW_IMG', 'review_img');
define('TBL_CART', 'cart');
define('TBL_ORDER', 'orders');
define('TBL_ORDER_DETAIL', 'order_details');
define('TBL_SHIPPING_ADD', 'shipping_address');
define('TBL_CONTACT', 'contact_info');
define('TBL_ABOUT', 'about');
define('TBL_CLIENT', 'client_say');
define('TBL_COUNTRY', 'country');
define('TBL_COUPON', 'coupon');
define('TBL_USED_COUPON', 'used_coupon');
define('TBL_LIMITED_TIME_BANNER', 'limited_time_banner');
define('TBL_CONTACT_LIST', 'contact');
define('TBL_PRIVACY', 'privacy');
define('TBL_HELP', 'help');
define('TBL_FAQ', 'faq');
define('TBL_NOTIFICATION', 'notification');
















define('STRIPE_SECRET_KEY','sk_test_YFNC2XWbJkO7mj4a3j79Ab9l00n85m7nwl');
define('ENC_KEY','Abeerfood');
define('OPTION','0');
define('VECTOR','1234567891011121');
define('CIPHER','AES-128-CTR');
define('URL','http://mobidudes.com/abeer/');
define('LOGOPATH',URL.'assets/img/logo.png');
define('FCM_KEY','AAAAyqlK8LA:APA91bEjTwCI-1QWkIwiKRQErsLSyP6sh3Lr2U8PLMRFnvYzpgccN0ewrCuTfG33NWUi7mw_TJVdtF02inyLrvrrXxwBb8bojskLCR9YWZo3nJn9Cx6RLIbTN7DN5z8v8C8ct_uyiZst');

