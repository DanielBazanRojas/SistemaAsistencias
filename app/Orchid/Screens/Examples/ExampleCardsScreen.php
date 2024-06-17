<?php

namespace App\Orchid\Screens\Examples;

use Illuminate\Http\Request;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ExampleCardsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'user' => User::firstOrFail(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Solicitudes de Ausencia';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Historial de solicitudes de ausencia generados';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function layout(): iterable
    {
        return [
            Layout::legend('user', [
                Sight::make('id')->popover('Identificador único del usuario'),
                Sight::make('name', 'Nombres'),
                Sight::make('email', 'Correo'),
                Sight::make('email_verified_at', 'Correo Verificado')->render(fn (User $user) => $user->email_verified_at === null
                    ? '<i class="text-danger">●</i> False'
                    : '<i class="text-success">●</i> True'),
                Sight::make('created_at', 'Fecha de Registro'),
                Sight::make('updated_at', 'Ultima Modificación'),
                Sight::make('Anotación')->render(fn () => 'Aun estamos trabajando en el historial de solicitudes de ausencia, asi que de momento le dejamos este curadro con los datos del usuario.'),
                Sight::make('Accion')->render(fn () => Button::make('Prueba de alertas')
                    ->type(Color::BASIC)
                    ->method('showToast')),
            ])->title('Usuario'),
        ];
    }

    public function showToast(Request $request): void
    {
        Toast::warning($request->get('toast', 'Prueba de alerta realizada con éxito'));
    }
}
