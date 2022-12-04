<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySystemUsers extends Model
{
    use SoftDeletes;

    protected $table = 'company_system_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_system_id', 'user_id', 'username', 'password'
    ];

    public function company_system(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_system_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}