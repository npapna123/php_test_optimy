<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Repositories\CommentRepository;

class CommentController
{

    protected $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    /**
     * list all comments
     * @return array
     */
    public function listComments(): array
    {
        $comments = [];
        foreach($this->commentRepository->getComments() as $row) {
            $commentModel = new Comment();
            $comments[] = $commentModel->setId($row['id'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at'])
                ->setNewsId($row['news_id']);
        }

        return $comments;
    }

    /**
     * add comment for news
     * @param string $body
     * @param int $newsId
     * @return string
     */
    public function addCommentForNews(string $body, int $newsId): string
    {
        $this->commentRepository->addNewComments($body, $newsId);
        return 'Comment has been added';
    }

    /**
     * delete comment by id
     * @param int $id
     * @return string
     */
    public function deleteComment(int $id): string
    {
        $this->commentRepository->deleteById($id);
        return 'Comment has been deleted ID:'. $id;
    }

}