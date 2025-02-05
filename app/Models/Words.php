<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    protected $fillable = [
        'word',
        'meaning_arabic',
    ];
    public function examples()
    {
        return $this->hasMany(Example::class, 'word_id');
    }
}
