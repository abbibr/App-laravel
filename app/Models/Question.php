<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;
    protected $table="questions";

    protected $fillable=array('question','profileimage','a','b','c','d','ans');

    public static function getEmployee()
    {
        $records=DB::table('questions')->select('question','profileimage','a','b','c','d','ans')
        ->get()->toArray();
        return $records;
    }
}
