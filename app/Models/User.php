<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'username',
        'type',
        'password',
        'address',
        'country',
        'country_code',
        'dial_code', 'phone',
        'avatar',
        'created_by',
        'is_active', 'lang', 'layout', 'color_scheme',
        'layout_width', 'layout_position', 'topbar_color', 'sidebar_size', 'sidebar_view', 'sidebar_color',
    ];

    public function family(){
        return $this->hasMany(UserFamilyInfo::class,'user_id');
    }

    public function messengerInbox(){
        return $this->hasMany(ChMessage::class,'to_id');
    }

    public function messengerOutbox(){
        return $this->hasMany(ChMessage::class,'from_id');
    }

    public function employeeDetail(){
        return $this->hasOne(EmployeeDetail::class);
    }

    public function getNameAttribute()
    {
        return "$this->firstname $this->middlename $this->lastname";
    }
    public function getFullNameAttribute()
    {
        return $this->getNameAttribute();
    }

    public function getPhoneNumberAttribute()
    {
        return "$this->dial_code $this->phone";
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'type' => UserType::class,
        ];
    }

    public function hasVerifiedPhone()
    {
        return !empty($this->phone_verified_at);
    }
}
