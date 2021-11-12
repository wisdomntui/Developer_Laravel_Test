<?php

namespace App\QueryFilter;

class Title
{
    public function handle($query, $next)
    {
        if (request()->has('title')) {
            $query->where('title', request('title'));
        }

        return $next($query);
    }
}
