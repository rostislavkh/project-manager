<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use App\Models\Project;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;

class ProjectList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'projects';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->defaultHidden()->sort()->filter(),
            TD::make('name', 'Name')->sort()->filter(),
            TD::make('slug', 'Slug')->sort()->filter(),
            TD::make('url', 'URL')->render(function (Project $model) {
                return Link::make($model->url)->href($model->url)->target('_blank');
            })->sort()->filter(),
            TD::make('is_active', 'Is active')->render(function (Project $model) {
                return Switcher::make()->checked($model->is_active ? true : false)->disabled();
            })->sort()->filter(),
            TD::make('actions', 'Actions')->render(function (Project $model) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        Link::make('Edit')->icon('pencil')->route('platform.project.edit', ['project' => $model->id]),
                        Button::make('Remove')->icon('trash')->confirm('Are you sure?')->method('remove', [
                            'id' => $model->id
                        ])
                    ]);
            })
        ];
    }
}
