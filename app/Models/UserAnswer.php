<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnswer extends Model
{
    use HasFactory;

    protected $table='user_answers';

    protected $fillable=[

            'user_id',
            'question_id',
            'answer',
            'is_correct'
    ];

    public function question(){

        return $this->belongsTo(Question::class);

        }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }    
}
