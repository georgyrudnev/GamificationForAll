<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isNull;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $guarded = [];
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post() {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function canEditOrDelete($user) {
        if (!isNull($user)) {
            if ($user->isAdmin()) {
                return true;
            }

            if ($this->author_id == $user->id) {
                return true;
            }
        }
       return false;
    }
}
