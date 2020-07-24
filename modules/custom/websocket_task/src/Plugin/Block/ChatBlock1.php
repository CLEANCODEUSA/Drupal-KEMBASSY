<?php

namespace Drupal\websocket_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Chat block.
 *
 * @Block(
 *   id = "chat_block1",
 *   admin_label = @Translation("Chat block 1"),
 * )
 */
class ChatBlock1 extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#title' => 'Chat block 1',
      '#theme' => 'chat_block1',
      '#form' => \Drupal::formBuilder()->getForm('\Drupal\websocket_task\Form\ChatForm1'),
      '#attached' => [
        'library' => [
          'websocket_task/chat',
        ],
      ],
    ];
  }

}
