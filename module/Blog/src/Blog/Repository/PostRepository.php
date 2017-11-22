<?php

namespace Blog\Repository;

interface PostRepository
{
    public function save(Post $post);
}
