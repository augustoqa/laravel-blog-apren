<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'iframe',
        'excerpt',
        'published_at',
        'category_id',
        'user_id',
    ];

    protected $dates = ['published_at'];
    protected $appends = ['published_date'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post) {
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        $query->with(['category', 'tags', 'owner', 'photos'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    public function scopeByYearAndMonth($query)
    {
        return $query->selectRaw('year(published_at) as year')
            ->selectRaw('month(published_at) as month')
            ->selectRaw('monthname(published_at) as monthname')
            ->selectRaw('count(*) as posts')
            ->groupBy('year', 'month','monthname')
            ->orderBy('month');
    }

    public function isPublished()
    {
        return (bool) $this->published_at && $this->published_at < today();
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = \Str::slug($this->title);

        if ($this->whereUrl($url)->exists()) {
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;
        $this->save();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
            ? $category
            : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function ($tag) {
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('M d'); 
    }

    public function viewType($home = '')
    {
        if ($this->photos->count() === 1):
            return 'posts.photo';
        elseif ($this->photos->count() > 1):
            return ($home === 'home') ? 'posts.carousel-preview' : 'posts.carousel';
        elseif ($this->iframe):
            return 'posts.iframe';
        else:
            return 'posts.text';
        endif;
    }
}
