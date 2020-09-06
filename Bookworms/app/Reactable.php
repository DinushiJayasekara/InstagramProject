<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait Reactable
{
    public function scopeWithReacts(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT post_id, SUM(reacted) reacts FROM reacts GROUP BY post_id',
            'reacts',
            'reacts.post_id',
            'posts.id'
        );
    }

    public function react($user = null, $reacted = true)
    {
        $this->reacts()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'reacted' => $reacted,
        ]);
    }
    
    public function unReact(User $user)
    {
        return $this->react($user, false);
    }

    public function isReactedBy(User $user)
    {
        return (bool) $this->reacts()->where('post_id', $this->id)->where('reacted', true)->count();
    }
    
    public function isUnreactedBy(User $user)
    {
        return (bool) $this->reacts()->where('post_id', $this->id)->where('reacted', false)->count();
    }

    public function reacts()
    {
        return $this->hasMany(React::class);
    }
}
