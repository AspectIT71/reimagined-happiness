<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title','content','date', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static();
        $post->fill($fields);
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/' . $this -> image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null){return;}
        $this->removeImage();
        Storage::delete('uploads/' . $this->image);
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null){
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function setCategory($id)
    {
        if($id == null){return;}

        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if($ids == null){return;}
        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = 0;
        $this->save();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setPublic()
    {
        $this->status = 1;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null){
            $this->setDraft();
        }
        else {
            $this->setPublic();
        }
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null){
            $this->setStandart();
        }
        else {
            $this->setFeatured();
        }
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y',$value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d',$value)->format('d/m/y');
        return $date;
    }

    public function getCategotyTitle( )
    {
        if ($this->category !== null)
        {
            return $this->category->title;
        }
        return 'нет категории';
    }

    public function getTagsTitles()
    {
        $tags = $this->tags->pluck('title')->all();
        return implode(', ', $tags);

    }

    public function getDate()
    {
       return Carbon::createFromFormat('d/m/y', $this->date)->format('d-m-y');
    }


}
