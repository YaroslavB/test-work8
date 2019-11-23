<?php

namespace App;

use App\Observers\ItemObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $uuid
 */
class Item extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'uuid';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function saveImage(UploadedFile $file)
    {
        Storage::putFileAs('items', $file, $this->uuid . '.jpg');
    }

    public function delete()
    {
        Storage::delete("items/{$this->uuid}.jpg");
        return parent::delete();
    }
}
