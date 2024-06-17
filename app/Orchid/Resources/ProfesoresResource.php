<?php

namespace App\Orchid\Resources;

use App\Models\Profesores;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ProfesoresResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Profesores::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make("nombre")
                ->title("Nombres")
                ->placeholder("Ingrese los nombres")
                ->required(),
            Input::make("apellidos")
                ->title("Apellidos")
                ->placeholder("Ingrese los apellidos")
                ->required(),
            Input::make("email")
                ->title("Correo")
                ->placeholder("Ingrese el correo electrónico")
                ->required(),
            Input::make("dni")
                ->title("DNI")
                ->placeholder("Ingrese numero de DNI")
                ->required(),
            Input::make("direccion")
                ->title("Dirección")
                ->placeholder("Ingrese la dirección del profesor")
                ->required(),
            Input::make("fecha_nacimiento")
                ->title("Fecha de Nacimiento")
                ->placeholder("Ingrese la fecha de nacimiento")
                ->required(),
            Input::make("telefono")
                ->title("Teléfono")
                ->placeholder("Ingrese el numero de teléfono")
                ->required(),
            Input::make("especialidad")
                ->title("Especialidad")
                ->placeholder("Ingrese la especialidad del profesor")
                ->required()
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('nombre', 'Nombres'),
            TD::make('apellidos', 'Apellidos'),
            TD::make('email', 'Correo'),
            TD::make('telefono', 'Teléfono'),
            TD::make('especialidad', 'Especialidad'),

            TD::make('created_at', 'Fecha de Registro')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id', 'ID'),
            Sight::make('nombre', 'Nombres'),
            Sight::make('apellidos', 'Apellidos'),
            Sight::make('email', 'Correo'),
            Sight::make('dni', 'DNI'),
            Sight::make('direccion', 'Dirección'),
            Sight::make('fecha_nacimiento', 'Fecha de Nacimiento'),
            Sight::make('telefono', 'Teléfono'),
            Sight::make('especialidad', 'Especialidad'),
            Sight::make('created_at', 'Fecha de Registro'),
            Sight::make('updated_at', 'Ultima Modificación'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
