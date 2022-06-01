<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestClassBase extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
public  $classBaseMessage;

    public function __construct($classBaseMessage="クラスベースのメッセージです。")
    {
        $this->classBaseMessage=$classBaseMessage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tests.test-class-base-component');
    }
}
