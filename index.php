<?php

require 'app/bootstrap.php';

use App\Controllers\CommentController;
use App\Controllers\NewsController;

$commentController = new CommentController();
$newsController = new NewsController();

foreach ($newsController->listNews()as $news) {
	echo("############ NEWS " . $news->getTitle()  . " ############\n");
	echo($news->getBody() . "\n");
	foreach ($commentController->listComments() as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}

// News kindly uncomment if need to test

//echo $newsController->deleteNews(1);
//echo $newsController->addNews('test title', 'test body');

// Comments kindly uncomment if need to test

//echo $commentController->addCommentForNews('comment body', 1);
//echo $commentController->deleteComment(1);
