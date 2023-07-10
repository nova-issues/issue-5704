<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Post>
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('name'),

            BelongsToMany::make('Meta', 'metas', Meta::class)
                ->fields(function (NovaRequest $request, $post) {
                    return [
                        Boolean::make('value')
                            ->hide()
                            ->showOnIndex(false)
                            ->dependsOn(
                                'metas',
                                function (Field $field, NovaRequest $request, FormData $data) {
                                    $meta = \App\Models\Meta::find($data->get('metas'));
                                    if ($meta?->type === "bool") {
                                        $field->show();
                                    }
                                }
                            ),
                        Select::make('value')
                            ->hide()
                            ->showOnIndex(false)
                            ->dependsOn(
                                'metas',
                                function (Field $field, NovaRequest $request, FormData $data) {
                                    $meta = \App\Models\Meta::find($data->get('metas'));
                                    if ($meta?->type === "enum") {
                                        $field->options($meta->values);
                                        $field->show();
                                    }
                                }
                            ),
                        MultiSelect::make('value')
                            ->hide()
                            ->showOnIndex(false)
                            ->dependsOn(
                                'metas',
                                function (Field $field, NovaRequest $request, FormData $data) {
                                    $meta = \App\Models\Meta::find($data->get('metas'));
                                    if ($meta?->type === "multi") {
                                        $field->options($meta->values);
                                        $field->show();
                                    }
                                }
                            ),
                        Text::make('value')
                            ->hide()
                            ->showOnIndex(false)
                            ->dependsOn(
                                'metas',
                                function (Field $field, NovaRequest $request, FormData $data) {
                                    $meta = \App\Models\Meta::find($data->get('metas'));
                                    if ($meta?->type === "string") {
                                        $field->show();
                                    }
                                }
                            ),
                    ];
                })
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
