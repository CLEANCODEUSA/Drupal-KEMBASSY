<?php

/**
 * @file
 * Contains \Drupal\custom_rest\Controller\TestAPIController.
 */

namespace Drupal\custom_rest\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller routines for custom_rest routes.
 */
class TestAPIController extends ControllerBase {

    /**
     * Callback for `feeds/get.json` API method.
     */
    public function get_example(Request $request) {

        // Example URL. Access url like below
        //http://localhost:8080/drupal-8.9.2/feeds/get.json?content_type=article&limit=10
        
        // Try to get URL request parameters for content type and limit
        $content_type = trim(strip_tags((\Drupal::request()->query->get('content_type'))));
        $limit = trim(strip_tags(\Drupal::request()->query->get('limit')));

        // Works for articles
        //$types = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'article', 'status' => 1]);

        // Works for basic page
        //$types = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type' => 'page', 'status' => 1]);

        // Another method. Pass above variables for search
        $nids = \Drupal::entityQuery('node')->condition('status', 1)->condition('type', $content_type)->range(0, $limit)->execute();
        $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

        foreach ($nodes as $node) {
            $article = array();
            $article['nid'] = $node->id();
            $article['title'] = $node->getTitle();
            $article['type'] = $node->getType();
            $article['created'] = $node->getCreatedTime();
            $article['created_php_date'] = date('m/d/Y H:i:s', $node->getCreatedTime());
            $article['changed'] = $node->get('changed')->value;
            //$article['body'] = $node->get('body')->getValue();
            $article['status'] = $node->get('status')->value;
            $article['uid'] = $node->getOwnerId();

            $owner = \Drupal\user\Entity\User::load($node->getOwnerId());
            $article['user_name'] = $owner->getUsername();

            $alias = \Drupal::service('path.alias_manager')->getAliasByPath('/node/' . $node->id());
            $article['alias'] = $alias;
            $article['url'] = $node->toUrl()->toString();
            $article['absolute_url'] = $node->toUrl()->setAbsolute()->toString();

            $response[] = $article;
        }
        return new JsonResponse($response);
    }

}
