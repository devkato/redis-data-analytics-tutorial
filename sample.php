<?php
  $redis = new Redis();
  $redis->pconnect('127.0.0.1', 6379);
  $redis->set('hello', 'world');

  $bitsA = '';
  $bitsB = '';

  for($i = 1; $i < 10; $i++) {
    $bit = rand(0, 1);
    $redis->setBit('bitsA', $i, $bit);
    $bitsA .= $bit;
  }

  for($i = 1; $i < 10; $i++) {
    $bit = rand(0, 1);
    $redis->setBit('bitsB', $i, $bit);
    $bitsB .= $bit;
  }

  echo 'bitsA : ' . $bitsA . "\n";
  echo 'bitsB : ' . $bitsB . "\n";

  $redis->bitop('AND', 'bitsAND', 'bitsA', 'bitsB');
  $redis->bitop('OR', 'bitsOR', 'bitsA', 'bitsB');

  echo 'bitAND : ' . $redis->bitcount('bitsAND') . "\n";
  echo 'bitOR : ' . $redis->bitcount('bitsOR') . "\n";

  $redis->close();
