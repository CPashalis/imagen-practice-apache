<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Tailwind Recipes
     *
     * @var string
     */
    public $tw = [
        'h1' => 'text-2xl md:text-3xl font-medium text-primary relative md:mb-6 mb-2',
        'h2' => 'text-xl md:text-2xl font-medium text-primary relative md:mb-6 mb-2',
        'h3' => 'text-xl md:text-2xl font-medium text-primary relative md:mb-4 mb-2',
        'h4' => 'text-base font-medium relative mb-2',
        'wrapper' => 'grid grid-cols-12 gap-3.5 md:gap-5 content-center xl:container mx-auto py-6 px-3.5 md:p-6 relative'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'tw' => $this->tw,
            'builder' => $this->getBuilder()
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns the site builder object. Requires ACF!
     *
     * @return string
     */
    public function getBuilder()
    {
        return get_field('content');
    }
}
