<?php
class RequestUtils {
    public static function getPostData($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    public static function getGetData($key, $default = null) {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
}
?>