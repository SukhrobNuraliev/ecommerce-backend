<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'icon' => $this->icon,
            'order' => $this->order,
            'parent_id' => $this->parent_id,
            'name' => $this->getTranslations('name'),
            'child_categories' => $this->childCategories,
        ];
    }
}
