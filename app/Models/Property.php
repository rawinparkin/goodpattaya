<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'category_id', 'id');
    }

    public function title()
    {
        return $this->belongsTo(PropertyTitle::class, 'id', 'property_id');
    }

    public function address()
    {
        return $this->belongsTo(PropertyAdress::class, 'id', 'property_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(PropertyLocation::class, 'location_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(PropertyOwner::class, 'id', 'property_id');
    }

    

    
}