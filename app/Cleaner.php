<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cleaners';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'quality_score'];
    
    #relationships
    
    /**
     * Defines the belongsToMany/belongsToMany (many to many) relationship between clener and City models
     *
     * @return mixed
     */
    public function cities()
    {
        return $this->belongsToMany('App\City', 'cleaners_cities', 'cleaner_id', 'city_id');
    }

    
}
