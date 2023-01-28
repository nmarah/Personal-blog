<?php

namespace App\View\Components\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationsMenu extends Component
{
    public $notifications;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count = 15)
    {
        $user = Auth::user();
        $user->notifications = $user->notifications;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.notifications-menu');
    }
}
