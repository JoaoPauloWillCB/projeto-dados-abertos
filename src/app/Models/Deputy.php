<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputy extends Model
{
    protected $fillable = [
        'deputy_id',
        'name',
        'party_acronym',
        'state_acronym',
        'id_legislature',
        'email',
        'uri_deputy_info',
        'uri_party_info',
        'url_photo_deputy'
    ];
}
