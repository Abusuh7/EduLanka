<?php

namespace Laravel\Jetstream\Http\Livewire;


use Illuminate\Support\Facades\Auth;

use Livewire\Component;


class NavigationMenu extends Component

{
    /**
     * The component's listeners.
     *
     * @var array
     */

    protected $listeners = [

        'refresh-navigation-menu' => '$refresh',

    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */

    public function render()

    {

        $role = Auth::user()->role;

        $status = Auth::user()->status;


        if($role == 'admin'){

            return view('admin.navigation-menu');

        }

        elseif($role == 'teacher' && $status == 'activated')

        {

            return view('teacher.navigation-menu');

        }

        elseif($role == 'primary' && $status == 'activated')

        {

            return view('primaryStudent.navigation-menu');

        }

        elseif($role == 'secondary' && $status == 'activated')

        {

            return view('secondaryStudent.navigation-menu');

        }

        elseif($role == 'teacher' && $status == 'deactivated' || $role == 'primary' && $status == 'deactivated' || $role == 'secondary' && $status == 'deactivated')

        {

            return view('deactivated-navigation-menu');

        }else{

            return view('terminated-navigation-menu');

        }

    }

}
