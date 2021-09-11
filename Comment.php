<?php


class Comment 
{
    private int $id;
    private int $article_id;
    private string $author;
    private string $comment_text;
    private string $date;

    public function getId() : int
    {
        return $this->id;
    }
    public function getArticleId() : int
    {
        return $this->article_id;
;
    }
    public function setArticleId(string $article_id) : self
    {
        $this->article_id = $article_id;
        return $this;
    }

    
    public function getAuthor():string
    {
        return $this->author;
    }

    public function setAuthor(string $author) : self
    {
        $this->author = $author;
        return $this;
    }


    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date) : self
    {
        $this->date = $date;
        return $this;
    }

    public function getComment() : string
    {
        return $this->comment_text;
    }

    public function setComment(string $comment_text):self
    {
        $this->comment_text = $comment_text;
        return $this;
    }

}
?>