<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Category;

class NavigationComposer
{
    public function compose(View $view)
    {
        $category = Category::all();
        
        $view->with('categories', $category);
    }
}