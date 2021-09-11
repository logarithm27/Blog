<?php


class Article 
{
    private int $id;
    private string $article_text;
    private string $title;
    private string $author;
    private int $category_id;

    public function getId() : int
    {
        return $this->id;
    }
    public function getArticleText() : string
    {
        return $this->article_text;
;
    }
    public function setArticleText(string $article_text) : self
    {
        $this->article_text = $article_text;
        return $this;
    }

    public function getTitle() : string
    {
        return $this->title ;
    }

    public function setArticleTitle(string $title) : self
    {
        $this->title = $title;
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

    public function setCategoryId(int $category_id) : self
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getCategoryId(): string
    {
        return $this->category_id;
    }

}
?>