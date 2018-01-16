<?php

require('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;

// デフォルトID/PW = guest/guest
$connection = new AMQPStreamConnection('queue', 5672, 'guest', 'guest');

// チャンネルを設定
$channel = $connection->channel();

// https://github.com/php-amqplib/php-amqplib/blob/master/PhpAmqpLib/Channel/AMQPChannel.php#L597
// string queue = ''
// bool passive = false
// bool durable = false
// bool exclusive = false
// bool auto_delete = true
// bool nowait = false
$channel->queue_declare('hello', false, false, false, false);


// コールバック関数の用意
$callback = function ($msg) {
    echo $msg->body . "\n";
};

// メッセージ受信
// https://github.com/php-amqplib/php-amqplib/blob/master/PhpAmqpLib/Channel/AMQPChannel.php#L901
// string queue = ''
// string consumer_tag = ''
// bool no_local = false
// bool no_ack = false
// bool exclusive = false
// bool nowait = false
// function callback = null
$channel->basic_consume('hello', '', false, true, false, false, $callback);

// メッセージ受信待ちループ
while(count($channel->callbacks)) {
    $channel->wait();
}