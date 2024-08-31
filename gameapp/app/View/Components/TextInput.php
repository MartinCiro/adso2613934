<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextInput extends Component
{
    public $type;
    public $name;
    public $value;
    public $placeholder;
    public $required;

    public function __construct($type = 'text', $name, $value = '', $placeholder = '', $required = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.text-input');
    }
}
