<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $uuid
 * @property string $image
 */
class Item extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'uuid';

    public function setImageAttribute(string $image)
    {
        Storage::putFileAs('items', new UploadedFile($image, $image), "{$this->uuid}.jpg");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function delete()
    {
        Storage::delete("items/{$this->uuid}.jpg");
        return parent::delete();
    }
}
