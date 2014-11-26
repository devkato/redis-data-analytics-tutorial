<?php
  $key = $argv[1];

  $redis = new Redis();
  $redis->pconnect('127.0.0.1', 6379);
  $redis->set('hello', 'world');

  $fp = fopen('php://stdin','r');

  while(($buf = fgets($fp, 1024)) !== false) {
    $redis->setBit($key, intval($buf), 1);
  }
