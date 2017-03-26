<?php

return [
   'client_id' => 'AV-o-HNDtd_Xo0tHWtdwa6jqJiwfNM2-I-wrLuO09Pbm9sGF4uhHPy6_hrwv6CBGyfgCbj2U7QUwEuVW',
   'secret' => 'EKxzYtJPfOkj9Cp118g0GjuLtWNQxsNf9QtbFZ7mZH1F-1FZOCnJcD_xLeUoeSo2AnxxZoZ00MbbIJtm',
   'settings' => [
       'http.CURLOPT_CONNECTTIMEOUT' => 30,
       'mode' => 'sandbox',
       'log.LogEnabled' => true,
       'log.FileName' => storage_path() . '/log/paypal.log',
       'log.LogLevel' => 'FINE'
   ]
];