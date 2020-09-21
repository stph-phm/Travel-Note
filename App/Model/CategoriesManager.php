<?php


namespace App\Model;


class CategoriesManager extends Manager
{
    public function listCategories () {
        $db = $this->dbConnect();
        $reqCategory = $db->query('
            SELECT * 
            FROM categories
        ');
        return $listCategories = $reqCategory->fetchAll();
    }

    public function addCategory($category, $description)
    {
        $db = $this->dbConnect();
        $reqCategory = $db->prepare('
            INSERT INTO categories (category, description) 
            VALUE (:category, :description ),
        ');

        $reqCategory->execute([
            'category' => $category,
            'description' => $description
        ]);
    }

    public function editCategory($category_id, $category, $description)
    {
        $db = $this->dbConnect();
        $reqCategory = $db->prepare('
            UPDATE category
            SET category = :category , description = :description
            WHERE id = :id
        ');

        $reqCategory->execute([

            "id" => $category_id,
            "category" => $category ,
            "description" => $description
        ]);
    }

    public function deleteCategory ($category_id)
    {
        $db = $this->dbConnect();
        $reqCategory = $db->prepare('
            DELETE FROM categories
            WHERE id = :id');
        $reqCategory->execute([
            'id' => $category_id
        ]);
    }
}