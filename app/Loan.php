<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    protected $fillable = ['book', 'student', 'created_at', 'return_date'];

    public function book(){
    	return $this->hasOne('App\Book', 'id', 'book_id');
    }

    public function user(){
    	return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getLoanDateAttribute($value)
    {
    	return Carbon::parse($value)->format('d/m/Y');
    }

    public function getReturnDateAttribute($value)
    {
    	return Carbon::parse($value)->format('d/m/Y');
    }
}
