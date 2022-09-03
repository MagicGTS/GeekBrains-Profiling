<?php
namespace App\Models;

use Franzose\ClosureTable\Models\Entity;

class Cource extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cources';

    /**
     * ClosureTable model instance.
     *
     * @var \App\Models\CourceClosure
     */
    protected $closure = 'App\Models\CourceClosure';
	
    public function image_list(){
        return $this->morphOne(ImageList::class,'hasImages'); //note this is not MorphMany()
    }  
}
