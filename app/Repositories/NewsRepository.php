<?php

namespace App\Repositories;

use App\Config\DB;

class NewsRepository {

    /**
     * get all the list in the DB
     */
    public function getNews()
    {
        $db = DB::getInstance();
        $news = $db->select('SELECT * FROM `news`');
        return $news;
    }

    /**
     * delete target by ID
     * @param int $id
     */
    public function deleteById(int $id)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM `news` WHERE `id`=" . $id;
        return $db->exec($sql);
    }

    /**
     * add news record to news DB
     * @param string $title
     * @param string $body
     */
    public function addNews(string $title, string $body)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
        $db->exec($sql);
        return $db->lastInsertId($sql);
    }
}
