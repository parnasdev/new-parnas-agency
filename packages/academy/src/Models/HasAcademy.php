<?php


namespace Packages\academy\src\Models;


trait HasAcademy
{
    public function episodes() {
        return $this->morphMany(Episode::class , 'episodetable');
    }

    public function seasons() {
        return $this->hasMany(Season::class);
    }

    public function learnings() {
        return $this->hasMany(Learning::class);
    }
}
