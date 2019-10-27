<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\item;
use Carbon\Carbon;

class Checklist extends Model
{
    protected $table = 'checklists';

    protected $fillable = [
        'template_id',
        'object_domain',
        'object_id',
        'description',
        'is_completed',
        'completed_at',
        'due',
        'due_interval',
        'due_unit',
        'urgency',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function setDueAttributes($value)
    {
        $this->attributes['due'] = Carbon::parse($value);
    }

    public function setCreatedAttributes($value)
    {
        $this->attributes['created_at'] = Carbon::parse($value);
    }

    public function setCompletedAttributes($value)
    {
        $this->attributes['completed_at'] = Carbon::parse($value);
    }

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'checklist_id');
    }
}
