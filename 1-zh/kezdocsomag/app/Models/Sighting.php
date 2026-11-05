<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sighting extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'craft_type',
        'identified',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'identified' => 'boolean',
        ];
    }

    public function witnesses(){
        return $this -> belongsToMany(Witness::class);
    }
}
