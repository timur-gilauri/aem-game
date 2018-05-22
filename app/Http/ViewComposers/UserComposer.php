<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 22.05.2018
 * Time: 0:11
 */

namespace App\Http\ViewComposers;


use App\Classes\CurrentUser;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with([
            'user' => app(CurrentUser::class)
        ]);
    }
}