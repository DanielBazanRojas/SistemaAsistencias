<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;

class Profesores extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;
    protected $fillable = ['nombre', 'apellidos', 'email', 'dni', 'direccion', 'fecha_nacimiento', 'telefono', 'especialidad'];
}
