<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    /**
     * The lists that belong to the image.
     */
    public function lists()
    {
        return $this->belongsToMany(ImageList::class, 'image_list_links')->withTimestamps()->withPivot('tag');;
    }
}
