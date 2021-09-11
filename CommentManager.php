<?php 

require_once 'DataBase.php';
require_once 'Comment.php';

class CommentManager extends Comment
{
    public static function findAllComments()
    {
        $select_statement = 'SELECT * FROM comments';
        $database = new DataBase();
        $connection = $database->connection();
        $select_query = $connection->prepare($select_statement);
        $select_query->execute();
        return $select_query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertComment()
    {
		$insert_statement = 'INSERT INTO comments(article_id, author, date_,comment_text) VALUES (:a_i,:a,:d,:c)';

		$database = new DataBase();
		$connection = $database->connection();
		$insert_query = $connection->prepare($insert_statement);
		$insert_query->execute([
			'a_i' => $this->getArticleId(),
			'a' => $this->getAuthor(),
			'd' => $this->getDate(),
			'c' => $this->getComment()
		]);
		return $insert_query->rowCount();
		
	}

	public static function findCommentById(int $id)
    {
		$search_statement = 'SELECT * FROM comments WHERE id = :id';

		$database = new DataBase();
		$connection = $database->connection();
		$search_query = $connection->prepare($search_statement);
		$search_query->execute(['id' => $id]);
		return $search_query->fetchAll(PDO::FETCH_CLASS, 'Comment');
	}

	public static function findCommentByArticleId(int $Artid)
    {
		$search_statement = 'SELECT * FROM comments WHERE article_id = :a_id';

		$database = new DataBase();
		$connection = $database->connection();
		$search_query = $connection->prepare($search_statement);
		$search_query->execute(['a_id' => $Artid]);
		return $search_query->fetchAll(PDO::FETCH_OBJ);
	}

	public function updateComment(Comment $comment_)
    {
		$update_statement = 'UPDATE comments 
                SET 
                article_id = :a_i, author = :a,
                date_ = :d, comment_text = :c
                WHERE id = :id';

		$database = new DataBase();
		$connection = $database->connection();
		$update_query = $connection->prepare($update_statement);
		$update_query->execute([
			'a_i' => $comment_->getArticleId(),
            'a' => $comment_->getAuthor(),
            'd' => $comment_->getDate(),
			'c' => $comment_->getComment(),
            'id' => $comment_->getId()
		]);

		return $update_query->rowCount();
	}

	public static function delete(int $id){
		$delete_statement = 'DELETE FROM comments WHERE id = :id';
		$bdd = new DataBase();
		$connection = $bdd->connection();
		$delete_query = $connection->prepare($delete_statement);
		$delete_query->execute(['id' => $id]);
		return $delete_query->rowCount();
	}
}
?>