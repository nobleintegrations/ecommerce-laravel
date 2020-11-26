<?php

namespace Lit\Config\Crud;

use App\Models\Category;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\CategoryController;

class CategoryConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Category::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CategoryController::class;

    /**
     * Model singular and plural name.
     *
     * @param Category|null category
     * @return array
     */
    public function names(Category $category = null)
    {
        return [
            'singular' => 'Category',
            'plural'   => 'Categories',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'categories';
    }

    /**
     * Build index page.
     *
     * @param  \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {
            $table->col('Title')->value('{title}')->sortBy('title');
            $table->col('Description')->value('{description}');
        })->search('title');
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('title');
            $form->input('slug')->readOnly()->width(1 / 4);
            $form->textarea('description');
        });
    }
}
