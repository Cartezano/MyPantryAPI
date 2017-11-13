<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_type_id', 'name', 'last_name', 'email', 'password', 'api_token'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'created_at', 'updated_at', 'deleted_at'];

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

    /**
     * Always capitalize the name when we save it to the database
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Always capitalize the last name when we save it to the database
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }

    /**
     * Always capitalize the email when we save it to the database
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Always capitalize the first name when we save it to the database
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * The user that belong to the user type.
     */
    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }

    /**
     * The user that belong to the pantry.
     */
    public function pantry()
    {
        return $this->belongsTo(Pantry::class);
    }
}
