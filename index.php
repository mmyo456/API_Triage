<?php
// 定义两个API的URL
$url1 = 'http://example.com/api1';
$url2 = 'http://example.com/api2';

// 使用cURL执行第一个API请求
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$response_code1 = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 使用cURL执行第二个API请求
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$response_code2 = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 检查哪个API返回了200 OK状态码
if ($response_code1 == 200) {
    // API1是可访问的，跳转到API1
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$url1);
} elseif ($response_code2 == 200) {
    // API2是可访问的，跳转到API2
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$url2);
} else {
    // 两个API都无法访问，显示错误消息
    echo 'Both APIs are not accessible.';
}
