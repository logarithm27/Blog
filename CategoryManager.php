<?php 

require_once 'DataBase.php';
require_once 'Category.php';

class CategoryManager extends Category
{
    public static function findAllCategories()
    {
        $select_statement = 'SELECT * FROM category';
        $database = new DataBase();
        $connection = $database->connection();
        $select_query = $connection->prepare($select_statement);
        $select_query->execute();
        return $select_query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert_category(){
		$insert_statement = 'INSERT INTO category(name) VALUES (:n)';

		$database = new DataBase();
		$connection = $database->connection();
		$insert_query = $connection->prepare($insert_statement);
		$insert_query->execute(['n' => $this->getName()]);
		return $insert_query->rowCount();
	}

	public static function findCategoryById(int $id)
    {
		$search_statement = 'SELECT * FROM category WHERE id = :id';

		$database = new DataBase();
		$connection = $database->connection();
		$search_query = $connection->prepare($search_statement);
		$search_query->execute(['id' => $id]);
		return $search_query->fetchAll(PDO::FETCH_CLASS, 'Category');
	}

	public function update(Category $category)
    {
		$update_statement = 'UPDATE category 
                SET name = :n, 
                WHERE id = :id';

		$database = new DataBase();
		$connection = $database->connection();
		$update_query = $connection->prepare($update_statement);
		$update_query->execute([
			'n' => $category->getName(),
            'id' => $category->getId()
		]);

		return $update_query->rowCount();
	}

	public static function delete(int $id)
    {
		$delete_statement = 'DELETE FROM category WHERE id = :id';
		$bdd = new DataBase();
		$connection = $bdd->connection();
		$delete_query = $connection->prepare($delete_statement);
		$delete_query->execute(['id' => $id]);
		return $delete_query->rowCount();
	}
}


?>