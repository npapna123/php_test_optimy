<?php

namespace App\Controllers;

use App\Models\News;
use App\Repositories\CommentRepository;
use App\Repositories\NewsRepository;

class NewsController
{

    protected $newsRepository;
    protected $commentRepository;
    protected $commentController;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
        $this->commentRepository = new CommentRepository();
        $this->commentController = new CommentController();
    }

    /**
     * list all news
     * @return array
     */
    public function listNews(): array
    {
        $news = [];
        foreach($this->newsRepository->getNews() as $row) {
            $newsModel = new News();
            $news[] = $newsModel->setId($row['id'])
                ->setTitle($row['title'])
                ->setBody($row['body'])
                ->setCreatedAt($row['created_at']);
        }

        return $news;
    }

    /**
     * add a record in news table
     *  @param string $title
     *  @param string $body
     *  @return string
     */
    public function addNews(string $title, string $body): string
    {
        $this->newsRepository->addNews($title, $body);
        return 'News has been added';
    }

    /**
     * deletes a news, and also linked comments
     * @param int $id
     * @return string
     */
    public function deleteNews(int $id): string
    {
        $comments = $this->commentController->listComments();
        $idsToDelete = [];
        foreach ($comments as $comment) {
            if ($comment->getNewsId() == $id) {
                $idsToDelete[] = $comment->getId();
            }
        }

        foreach($idsToDelete as $id) {
            $this->commentRepository->deleteById($id);
        }

        $this->newsRepository->deleteById($id);
        return 'News and comments has been added';
    }
}