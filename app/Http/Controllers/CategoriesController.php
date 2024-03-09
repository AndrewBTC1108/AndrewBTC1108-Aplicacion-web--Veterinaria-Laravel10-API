<?php

namespace App\Http\Controllers;

use App\Http\Resources\Categories\AdminCategoriesCollection;
use App\Http\Resources\Categories\CategoriaCollection;
use App\Models\AdminCategories;
use App\Models\Categoria;
// use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        return new CategoriaCollection(Categoria::all());

    }

    public function adminCategories()
    {
        return new AdminCategoriesCollection(AdminCategories::all());
    }
}
