<?php

namespace DenisJunio\NovaCreateOrAdd\Traits;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Nova;

trait HasChildren
{

    /**
     * Get Relation.
     *
     * @param $resource
     * @param $attribute
     * @return mixed
     */
    protected function getRelation($resource, $attribute) {
        return $resource->attribute;
    }

    /**
     * Add children.
     *
     * @param $resource
     * @param $attribute
     *
     * @return self
     */
    protected function setChildren($resource, $attribute) {
        return $this->withMeta([
            'children' => $this->getRelation($resource, $attribute)->get()->map(function ($model, $index) {
                return $this->setChild($model, $index);
            }),
        ]);
    }

    /**
     * Set child.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param $index
     * @return array
     */
    protected function setChild(Model $model, $index = self::INDEX)
    {
        $this->setPrefix($index + 1)->setAttribute($index);

        $array = [
            'resourceId'      => $model->id,
            'resourceName'    => Nova::resourceForModel($this->getRelation()->getRelated())::uriKey(),
            'viaResource'     => $this->viaResource,
            'viaRelationship' => $this->viaRelationship,
            'viaResourceId'   => $this->viaResourceId,
            'heading'         => $this->getHeading(),
            'attribute'       => self::ATTRIBUTE_PREFIX.$this->attribute,
            'opened'          => isset($this->meta['opened']) && ($this->meta['opened'] === 'only first' ? $index === 0 : $this->meta['opened']),
            'fields'          => $this->setFieldsAttribute($this->updateFields($model))->values(),
            'max'             => $this->meta['max'] ?? 0,
            'min'             => $this->meta['min'] ?? 0,
            self::STATUS      => null,
        ];

        $this->removePrefix()->removeAttribute();

        return $array;
    }

    /**
     * Get fields.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string|null  $type
     *
     * @return FieldCollection
     */
    private function updateFields(Model $model)
    {
        return (new $this->relatedResource($model))->updateFields(NovaRequest::create('/'));
    }
}
