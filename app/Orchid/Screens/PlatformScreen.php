<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Http\Requests\CreateProject;
use App\Orchid\Layouts\ProjectList;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\Switcher;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'projects' => \App\Models\Project::filters()
                ->defaultSort('id', 'desc')
                ->paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Project list';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Website')
                ->href(env('APP_URL'))
                ->icon('globe-alt')
                ->target('_blank'),
            ModalToggle::make(__('Create'))->icon('plus')->modal('create')->modalTitle(__('Create project'))->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('create', Layout::rows([
                Input::make('name')->title(__('Name'))->required(),
                Input::make('url')->title(__('URL'))->required(),
                Switcher::make('is_active')->checked()->title(__('Is active?'))->sendTrueOrFalse(),
            ])),
            ProjectList::class
        ];
    }

    public function create(CreateProject $request)
    {
        \App\Models\Project::create([
            'name' => $request->name,
            'url' => $request->url,
            'is_active' => $request->is_active,
        ]);

        Toast::success(__('Project was created'));
    }

    public function remove(Request $request)
    {
        \App\Models\Project::find($request->id)->delete();

        Toast::success(__('Project was removed'));
    }
}
