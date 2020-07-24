<?php

namespace Drupal\websocket_task;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\websocket_task\WsServer;

/**
 * Class SocketServer.
 *
 * @package Drupal\websocket_task
 */
class SocketServer {

  /**
   * Starts websocket_task server.
   */
  public static function run() {
    $server = IoServer::factory(
      new HttpServer(
        new WsServer(
          new Chat()
        )
      ),
      3000
    );

    $server->run();

  }

}
