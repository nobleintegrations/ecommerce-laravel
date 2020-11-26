<?php

namespace Lit\Config\Crud;

use App\Models\Customer;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Crud\CustomerController;

class CustomerConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Customer::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CustomerController::class;

    /**
     * Model singular and plural name.
     *
     * @param Customer|null customer
     * @return array
     */
    public function names(Customer $customer = null)
    {
        return [
            'singular' => 'Customer',
            'plural'   => 'Customers',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'customers';
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
            $table->col('Name')->value('{name}')->sortBy('name');
            $table->col('Phone')->value('{phone}');
            $table->col('City')->value('{city}');
            $table->col('State')->value('{state}');
        })->search('name');
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
            $form->input('name');
            $form->input('phone')->type('tel');
            $form->input('address');
            $form->input('city')->width(1 / 3);
            $form->select('state')
                ->options([
                    'Alabama' => 'Alabama',
                    'Alaska' => 'Alaska',
                    'Arizona' => 'Arizona',
                    'Arkansas' => 'Arkansas',
                    'California' => 'California',
                    'Colorado' => 'Colorado',
                    'Connecticut' => 'Connecticut',
                    'Delaware' => 'Delaware',
                    'Florida' => 'Florida',
                    'Georgia' => 'Georgia',
                    'Hawaii' => 'Hawaii',
                    'Idaho' => 'Idaho',
                    'Illinois' => 'Illinois',
                    'Iowa' => 'Iowa',
                    'Kansas' => 'Kansas',
                    'Kentucky' => 'Kentucky',
                    'Louisiana' => 'Louisiana',
                    'Maine' => 'Maine',
                    'Maryland' => 'Maryland',
                    'Massachusetts' => 'Massachusetts',
                    'Michigan' => 'Michigan',
                    'Minnesota' => 'Minnesota',
                    'Mississippi' => 'Mississippi',
                    'Missouri' => 'Missouri',
                    'Montana' => 'Montana',
                    'Nebraska' => 'Nebraska',
                    'Nevada' => 'Nevada',
                    'New Hampshire' => 'New Hampshire',
                    'New Jersey' => 'New Jersey',
                    'New Mexico' => 'New Mexico',
                    'New York' => 'New York',
                    'North Carolina' => 'North Carolina',
                    'North Dakota' => 'North Dakota',
                    'Ohio' => 'Ohio',
                    'Oklahoma' => 'Oklahoma',
                    'Oregon' => 'Oregon',
                    'Pennsylvania' => 'Pennsylvania',
                    'Rhode Island' => 'Rhode Island',
                    'South Carolina' => 'South Carolina',
                    'South Dakota' => 'South Dakota',
                    'Tennessee' => 'Tennessee',
                    'Texas' => 'Texas',
                    'Utah' => 'Utah',
                    'Vermont' => 'Vermont',
                    'Virginia' => 'Virginia',
                    'Washington' => 'Washington',
                    'West Virginia' => 'West Virginia',
                    'Wisconsin' => 'Wisconsin',
                    'Wyoming' => 'Wyoming',
                ])
                ->width(1 / 3);
            $form->input('postal_code')->width(1 / 3);
            $form->select('country')
                ->options([
                    'US' => 'US',
                ])
                ->width(1 / 4);
        });
    }
}
