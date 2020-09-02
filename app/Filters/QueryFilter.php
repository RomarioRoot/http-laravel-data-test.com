<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $request;

    protected $builder;

    protected $delimiter = ',';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters()
    {
        return $this->request->query();
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name) and $value !== null) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    protected function paramsToArray($param)
    {
        return explode($this->delimiter, $param);
    }

    protected function paramsToBool($param)
    {
        return $param == "on" ? true : false;
    }

    protected function paramsToBoolNum($param)
    {
        return $param == "on" ? 1 : 0;
    }
}
