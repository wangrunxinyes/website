<?php

$url = $_GET['url'];

$data = curl_helper::curl($url);
            $helper = new map_helper();
            $helper->handle_data($data, $store_category);

?>