<?php

namespace Blog\Repository;

use Blog\Entity\Post;

class PostRepositoryImpl implements PostRepository
{
    protected $dbAdapter;

    public function save(Post $post)
    {
        $sql = new \Zend\Db\Sql\Sql($this->dbAdapter);
        $insert = $sql->insert()
            ->values(array(
              'title' => $post->getTitle(),
              'slug' => $post->getSlug(),
              'content' => $post->getContent(),
              'category_id' => $post->getCategory(),
              'created' => time(),
            ))
            ->into('post');

        $statement = $sql->prepareStatementForSqlObject($insert);
        $statement->execute();
    }

    public function setDbAdapter($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }
}
