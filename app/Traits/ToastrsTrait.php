<?php

namespace App\Traits;

trait ToastrsTrait
{
    protected function toastrSuccess($message)
    {
        toastr()->success(message: '', title: __($message));
    }

    protected function toastrError($message)
    {
        toastr()->error(message: '', title: __($message));
    }
}
