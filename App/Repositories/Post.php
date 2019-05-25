<?php

namespace App\Repositories;

use App\Models\Post as Model;

class Post extends ApiRepository
{
    /**
     * @return array|string
     */
    public function getPostsByParameters()
    {
        try {
            $result = $this->apiQuery('posts');
        } catch (\Exception $e) {
            // Will try to regenerate token
            $this->apiQuery('register');

            $result = $this->apiQuery('posts');
        }

        $posts = [];

        if ($this->isResponseValid($result)) {
            foreach ($result['data']['posts'] as $post) {
                $posts[$post['id']] = $post;
            }
        }

        return $posts;
    }

    /**
     * @param array $array
     * @return Model
     */
    public function fromArray(array $array = []): Model
    {
        return (new Model())
            ->setId($array['id'])
            ->setFromId($array['from_id'])
            ->setFromName($array['from_name'])
            ->setMessage($array['message'])
            ->setType($array['type'])
            ->setCreatedAt($array['created_time']);
    }
}
