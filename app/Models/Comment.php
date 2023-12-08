<?php

namespace App\Models;

class Comment
{
	protected $id, $body, $createdAt, $newsId;

	public function setId(int $id): Comment
	{
		$this->id = $id;

		return $this;
	}

	public function getId(): int
	{
		return $this->id;
	}
	public function setBody(string $body): Comment
    {
		$this->body = $body;

		return $this;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function setCreatedAt(string $createdAt): Comment
    {
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}

	public function getNewsId(): int
	{
		return $this->newsId;
	}

	public function setNewsId(int $newsId)
	{
		$this->newsId = $newsId;

		return $this;
	}
}