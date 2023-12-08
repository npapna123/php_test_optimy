<?php

namespace App\Repositories;

use App\Config\DB;

class CommentRepository {

    /**
     * get list of comments from DB
     */
    public function getComments()
    {
        $db = DB::getInstance();
        $comment = $db->select('SELECT * FROM `comment`');
        return $comment;
    }

    /**
     * delete comment by ID
     * @param int $id
     */
    public function deleteById(int $id)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM `comment` WHERE `id`=" . $id;
        return $db->exec($sql);
    }

    /**
     * add record comments to comments table
     * @param string $body
     * @param int $newsId
     */
    public function addNewComments(string $body, int $newsId)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
        $db->exec($sql);
        return $db->lastInsertId($sql);
    }
}
