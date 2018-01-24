<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    protected $table = 'apotek';
    protected $fillable = ['nama','alamat','kontak','lat','lng'];
}
