<?php

namespace App\Orchid\Screens;

use App\Models\Project;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EditProject extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $project;

    public function query(Project $project): iterable
    {
        return [
            'project' => $project
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit project';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save')->icon('check')->method('save')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('project.id')->hidden(),
                Group::make([
                    Input::make('project.name')->title(__('Name'))->required(),
                    Input::make('project.url')->title(__('URL'))->required(),
                ]),
                Switcher::make('project.is_active')->checked()->title(__('Is active?'))->sendTrueOrFalse(),
            ])
        ];
    }

    public function save(Project $model, \App\Http\Requests\EditProject $request) {
        $model->update([
            'name' => $request->project['name'],
            'url' => $request->project['url'],
            'is_active' => $request->project['is_active']
        ]);

        Toast::success('Project is updated');

        return redirect()->route('platform.main');
    }
}
