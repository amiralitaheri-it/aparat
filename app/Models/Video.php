<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function lengthInHuman(): Attribute
    {
        return Attribute::make(
            get: fn() => gmdate('i:s', $this->length)
        );
    }

    public function createdAtInHuman(): Attribute
    {
        return Attribute::make(
            get: fn() => (new Verta($this->created_at))->formatDifference()
        );
    }

    public function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->category?->name
        );
    }

    public function relatedVideos(int $count = 6)
    {
        return $this->category?->getRandomVideos($count)->except($this->id);
    }
}