<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanySystems extends Model
{
    protected $table = 'company_systems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'system_id', 'start_date', 'end_date'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class, 'company_id');
    }
}
