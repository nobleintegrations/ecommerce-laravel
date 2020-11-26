<?php

namespace Lit\Config\Crud;

use App\Models\Product;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\ProductController;

class ProductConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Product::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProductController::class;

    /**
     * Model singular and plural name.
     *
     * @param Product|null product
     * @return array
     */
    public function names(Product $product = null)
    {
        return [
            'singular' => 'Product',
            'plural'   => 'Products',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'products';
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
            $table->col('Sku')->value('{sku}');
            $table->col('Amount')->value('{amount}');
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
            $form->input('title')->width(3 / 4);
            $form->boolean('published_at')->title('Published')->width(1 / 4);
            $form->input('slug')->readonly()->width(3/ 4);
            $form->input('sku')->width(1 / 2);
            $form->input('amount')->width(1 / 2)->type('number');
            $form->textarea('description');
        });
    }
}
