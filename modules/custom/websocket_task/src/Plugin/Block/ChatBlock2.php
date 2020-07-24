<?php

namespace Drupal\websocket_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Chat block.
 *
 * @Block(
 *   id = "chat_block2",
 *   admin_label = @Translation("Chat block 2"),
 * )
 */
class ChatBlock2 extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#title' => 'Chat block 2',
      '#theme' => 'chat_block2',
      '#form' => \Drupal::formBuilder()->getForm('\Drupal\websocket_task\Form\ChatForm2'),
      '#attached' => [
        'library' => [
          'websocket_task/chat',
        ],
      ],
    ];
  }

}
