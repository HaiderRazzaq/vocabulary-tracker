<?php
namespace App\Models;

use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $fillable = [
        'sentence',
        'word_id',
    ];
    public function word()
    {
        return $this->belongsTo(Word::class, 'word_id');
    }
}
