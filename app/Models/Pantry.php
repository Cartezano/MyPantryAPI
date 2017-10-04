<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pantry extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pantries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['run', 'digit_verify', 'name', 'last_name', 'phone', 'email', 'password'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
