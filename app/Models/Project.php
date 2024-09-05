<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'description',
        'status',
        'published_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    /**
     * Get the image associated with the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the user that created the project.
     */
    protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('M d, Y'), // Adjust the format as needed
        );
    }

    /**
     * Get the formatted end date.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function formattedPublishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->published_at ? Carbon::parse($this->published_at)->format('M d, Y') : 'Ongoing',
        );
    }
}
