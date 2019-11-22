<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function item()
    {
        return $this->hasOne(Item::class, 'image_id');
    }
}
