<?php

namespace App\View\Components;

use App\Models\Notif;
use Illuminate\View\Component;

class NotificationComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $count = Notif::active()->count();
        return view('components.notification-component', ['count' => $count]);
    }
}
