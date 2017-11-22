<?php

namespace Blog\Service;

use Blog\Entity\Post;

interface BlogService
{
    /*
     * Saves a blog post
     * Returns @Post 
     */
    public function save(Post $post);
}
