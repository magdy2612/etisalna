<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanySystems extends Model
{
    use SoftDeletes;

    protected $table = 'company_systems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'system_id', 'link', 'start_date', 'end_date'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class, 'system_id');
    }
}
