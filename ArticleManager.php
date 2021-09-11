<?php 

require_once 'DataBase.php';
require_once 'Article.php';

class ArticleManager extends Article
{
    public static function findAllArticles()
    {
        $select_statement = 'SELECT * FROM article';
        $database = new DataBase();
        $connection = $database->connection();
        $select_query = $connection->prepare($select_statement);
        $select_query->execute();
        return $select_query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertArticle()
    {
		$insert_statement = 'INSERT INTO article(title, article_text, category_id, author) VALUES (:t,:a_t,:c_i,:a)';

		$database = new DataBase();
		$connection = $database->connection();
		$insert_query = $connection->prepare($insert_statement);
		$insert_query->execute([
            't' => $this->getTitle(),
            'a_t' => $this->getArticleText(),
            'c_i' => $this->getCategoryId(),
            'a' => $this-> getAuthor()
        ]);
		return $insert_query->rowCount();
	}

	public static function findArticleByCatId(int $catId)
    {
		$search_statement = 'SELECT * FROM article WHERE category_id = :c_id';
		$database = new DataBase();
		$connection = $database->connection();
		$search_query = $connection->prepare($search_statement);
		$search_query->execute(['c_id' => $catId]);
		return $search_query->fetchAll(PDO::FETCH_OBJ);
	}

	public static function findById(int $id)
    {
		$search_statement = 'SELECT * FROM article WHERE id = :id';
		$database = new DataBase();
		$connection = $database->connection();
		$search_query = $connection->prepare($search_statement);
		$search_query->execute(['id' => $id]);
		return $search_query->fetchAll(PDO::FETCH_CLASS, 'Article');
	}

	public function updateArticle(Article $article)
    {
		$update_statement = 'UPDATE article 
                SET 
                title = :t, article_text = :a_t,
                author = :a, category_id = :c_i
                WHERE id = :id';

		$database = new DataBase();
		$connection = $database->connection();
		$update_query = $connection->prepare($update_statement);
		$update_query->execute([
			't' => $article->getTitle(),
			'a_t' => $article->getArticleText(),
            'c_i' => $article->getCategoryId(),
            'a' => $article->getAuthor(),
            'id' => $article->getId()
		]);

		return $update_query->rowCount();
	}

	public static function delete(int $id)
    {
		$delete_statement = 'DELETE FROM article WHERE id = :id';
		$bdd = new DataBase();
		$connection = $bdd->connection();
		$delete_query = $connection->prepare($delete_statement);
		$delete_query->execute(['id' => $id]);
		return $delete_query->rowCount();
	}
}


?>