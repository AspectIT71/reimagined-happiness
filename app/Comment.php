<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function author()
    {

        return $this->belongsTo(User::class, 'user_id');

    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function toggleStatus()
    {
        if($this->status == 0)
        {
            return $this->allow();
        }

        return $this->disAllow();
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
