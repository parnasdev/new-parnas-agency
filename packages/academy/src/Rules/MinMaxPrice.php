<?php

namespace Packages\academy\src\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;

class MinMaxPrice implements Rule
{
    public string $type = '';

    public int $price = 0;

    /**
     * Create a new rule instance.
     *
     * @param string $type
     * @param string $price
     */
    public function __construct(string $type = 'min',string $price = '0')
    {
        $this->type = strtolower($type);
        $this->price = (int)str_replace(',' , '' , $price);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        switch ($this->type) {
            case 'min' :
                return (int)str_replace(',' , '' , $value) <= $this->price;
                break;
            case 'max':
                return (int)str_replace(',' , '' , $value) >= $this->price;
                break;
            default:
                return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $name = $this->type == 'min' ? 'کوچکتر' : 'بزرگتر';
        return "این قیمت باید {$name} از :attribute باشد.";
    }
}
