<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function author()
    {
        $this->hasOne(User::class);
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function allow()
    {
        $this->status = 1;
        $this->save();
    }

    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
