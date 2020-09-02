<?php

namespace App\Filters;

class UserFilters extends QueryFilter
{
    public function active($status)
    {
        return $this->builder->where('is_active', $this->paramsToBoolNum($status));
    }

    public function age($values)
    {
        return $this->builder->whereBetween('age', $this->paramsToArray($values));
    }

    public function height($values)
    {
        return $this->builder->whereBetween('height', $this->paramsToArray($values));
    }

    public function gender($id)
    {
        return $this->builder->where('gender_id', $id);
    }

    public function country($ids)
    {
        return $this->builder->whereIn('country_id', $ids);
    }

    public function color($ids)
    {
        return $this->builder->whereIn('color_id', $ids);
    }
}
