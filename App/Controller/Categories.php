<?php


namespace App\Controller;

class Categories
{
    public function listCategories()
    {
        include 'View/Categories/listCategoriesView.php';
    }

    public function addCategory()
    {
        include 'View/Categories/addCategory.php';
    }

    public function editCategory()
    {
        include 'View/Categories/editCategoryView.php';
    }

    public function deleteCatagory()
    {

    }
}