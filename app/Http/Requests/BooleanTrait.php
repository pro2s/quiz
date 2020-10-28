<?php

namespace App\Http\Requests;

/**
 * @property string[]|null $booleans
 */
trait BooleanTrait
{
     /**
     * Extend the FormRequest prepareForValidation() method to
     * add boolean attributes specified to the request data, setting
     * their value to the presence of the data in the original request.
     *
     * @return void
     */
    protected function prepareBooleanForValidation(): void
    {
        $attributes = [];

        foreach ($this->booleans ?? [] as $attribute) {
            $attributes[$attribute] = $this->has($attribute);
        }

        $this->merge($attributes);
    }
}
