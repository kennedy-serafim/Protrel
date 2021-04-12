<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'company_id', 'job_role_id', 'firstname', 'lastname',
        'phone', 'email', 'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contests()
    {
        return $this->hasMany(Contest::class);
    }
}
