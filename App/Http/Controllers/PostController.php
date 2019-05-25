<?php

namespace App\Http\Controllers;

use App\Http\LogicWrapper\StatisticsWrapper;
use App\Models\Post;
use App\Repositories\Post as PostRepository;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends BaseController
{
    public function index()
    {
        $posts = [];

        for ($i = 1; $i <= Post::MAX_PAGE_NUM; $i++) {
            $posts = array_merge($posts, (new PostRepository())
                ->setGetParameters(['page' => $i])
                ->getPostsByParameters());
        }

        $results = (new StatisticsWrapper($posts))
            ->execute()
            ->getResult();

        $this->jsonResponse($results);
    }
}
