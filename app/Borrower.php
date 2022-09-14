<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrower extends Model
{
    use UuidTrait, Notifiable;
    protected $guarded = [];

}
