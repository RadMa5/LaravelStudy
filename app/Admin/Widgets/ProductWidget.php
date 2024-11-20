<?php

namespace App\Admin\Widgets;

Use Arrilot\Widget\AbstractWidget;
Use App\Models\Product;

class ProductWidget extends AbstractWidget {
    protected $config = [];

    public function run(){
        $count = Product::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-buy',
            'title' => 'Product counter',
            'text' => 'Amount of products: {$count}',
            'button' => [
                'text' => 'Product list',
                'link' => '',
            ],

        ]));
    }
}