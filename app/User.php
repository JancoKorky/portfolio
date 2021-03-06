<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title', 'text'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRichTextAttribute(){
        return add_paragraphs(filter_url(e($this->text)), 'class="lead"');
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function album()
    {
        return $this->hasMany(Album::class);
    }

    public function portfolioImages()
    {
        return $this->hasMany(PortfolioImage::class);
    }

}
