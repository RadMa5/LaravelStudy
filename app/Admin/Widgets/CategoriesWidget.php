<?php

namespace App\Admin\Widgets;

Use Arrilot\Widget\AbstractWidget;
use App\Models\Category;

class CategoriesWidget extends AbstractWidget {
    protected $config = [];

    public function run(){
        $count = Category::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-buy',
            'title' => 'Category counter',
            'text' => 'Amount of categories: {$count}',
            'button' => [
                'text' => 'Category list',
                'link' => '',
            ],

        ]));
    }
}