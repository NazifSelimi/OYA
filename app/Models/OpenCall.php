<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class OpenCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'description',
        'status',
        'published_at',
    ];

    protected $casts =[
        'published_at' => 'date'
    ];
    /**
     * Get the image associated with the open call.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the user that created the open call.
     */
    protected function formattedPublishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->published_at ? Carbon::parse($this->published_at)->format('M d, Y') : 'Ongoing',
        );
    }
}
