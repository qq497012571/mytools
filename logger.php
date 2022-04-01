#!/usr/bin/php
<?php
$cmd = "kubectl -n  mix-dev  exec -it {pod-name} -c php bash\n";
$cmd .= "tail -n100000 -f /data/logs/mix_ads_web/*{pod-name}*{date}.log | grep \"{keyword}\"\n";

$pod = $argv[1] ?? '';
$keyword = $argv[2] ?? '';

echo str_replace(['{pod-name}', '{date}', '{keyword}'], [$pod, date('Ymd'), $keyword], $cmd);

// tail -n100000 -f /data/logs/mix_ads_web/*web-ads-testing-mix-ads-web-6cf8c55df9-6skzp*20220401.log | grep 'OPEN_MESSENGER_PLUGIN'