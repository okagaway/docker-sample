<?php
require('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

// デフォルトID/PW = guest/guest
$connection = new AMQPStreamConnection('queue', 5672, 'guest', 'guest');

// 送信するチャンネルを設定
$channel = $connection->channel();

// https://github.com/php-amqplib/php-amqplib/blob/master/PhpAmqpLib/Channel/AMQPChannel.php#L597
// string queue = ''
// bool passive = false
// bool durable = false
// bool exclusive = false
// bool auto_delete = true
// bool nowait = false
//$channel->queue_declare('hello', false, false, false, false);

// メッセージ作成
$msg = new AMQPMessage('Hello World!');

// メッセージ送信
// https://github.com/php-amqplib/php-amqplib/blob/master/PhpAmqpLib/Channel/AMQPChannel.php#L1086
// string msg
// string exchange = ''
// string routing_key = ''
$channel->basic_publish($msg, '', 'hello');