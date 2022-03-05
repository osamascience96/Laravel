<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // creating the mutator for the password
    // public function setPasswordAttribute($password){
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // // creating the accessor for the password
    // public function getNameAttribute($name){
    //     return "My name is " . ucfirst($name);
    // }

    // function to upload the avatar
    public static function uploadAvatar($imageObj){
        $loggedInUser = auth()->user();

        $filename = $imageObj->getClientOriginalName();
        // delete the old image
        (new self())->deleteOldImage($loggedInUser->avatar);
        $imageObj->storeAs('images', $filename, 'public');
        // User::find(1)->update(['avatar' => $filename]);
        $loggedInUser->update(['avatar' => $filename]);
    }

    private function deleteOldImage($image){
        if ($image){
            Storage::delete('/public/images/' . $image);
        }
    }
}
