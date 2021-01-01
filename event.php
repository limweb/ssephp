<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache'); // recommended to prevent caching of event data.

/**
 * Constructs the SSE data format and flushes that data to the client.
 *
 * @param string $id Timestamp/id of this connection.
 * @param string $msg Line of text that should be transmitted.
 */
function sendMsg($id, $msg,$retry=10000) {

  echo "retry: $retry".PHP_EOL;

  echo "id: $id".PHP_EOL;
  echo "data: $msg".PHP_EOL,PHP_EOL;

  echo 'event: userlogon',PHP_EOL;
  echo "id: $id".PHP_EOL;
  echo 'data: {"msg": "userlogon"}',PHP_EOL,PHP_EOL;

  $o = new stdClass();
  $o->id = $id;
  $o->msg = $msg;
  $o->name = 'tlen';

  echo 'event: update',PHP_EOL;
  echo "id: $id".PHP_EOL;
  echo 'data: ',json_encode($o),PHP_EOL,PHP_EOL;
  ob_flush();
  flush();
}

$serverTime = time();

sendMsg($serverTime, 'server time: ' . date("h:i:s", time()));