<?php
namespace App\Models;

class Post
{
    /**
     * Max number of pages
     */
    const MAX_PAGE_NUM = 10;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $fromName;

    /**
     * @var string
     */
    private $fromId;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Post
     */
    public function setId(string $id): Post
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     * @return Post
     */
    public function setFromName(string $fromName): Post
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromId(): string
    {
        return $this->fromId;
    }

    /**
     * @param string $fromId
     * @return Post
     */
    public function setFromId(string $fromId): Post
    {
        $this->fromId = $fromId;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Post
     */
    public function setMessage(string $message): Post
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Post
     */
    public function setType(string $type): Post
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Post
     */
    public function setCreatedAt(string $createdAt): Post
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
