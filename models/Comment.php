<?php

use Blog\Model;

class Comment extends Model
{
	public function saveComment($idArticle, $comment)
	{
		$sql = 'INSERT INTO comments
			id=NULL,
			content = :comment
		';

        $arg = array(
        		':comment' => $comment
        );

        $this->app['sql']->prepareExec($sql, $arg)->fetchAll();
	
        $query = 'INSERT INTO comments_articles
			id = NULL,
			id_comment = :commentId,
			id_article = :articleId
		';

		$argument = array(
			':commentId' => $this->app['sql']->$lastId(),
			':articleId' => $idArticle
		);

		$this=>app['sql']->prepareExec($query, $argument)->fetchAll();
	}
}

