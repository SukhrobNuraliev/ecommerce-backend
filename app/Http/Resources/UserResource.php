<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "full_name" => $this->last_name . ' ' . $this->first_name,
            "email" => $this->email,
            "phone" => $this->phone,
            "settings" => UserSettingResource::collection($this->settings),
            "roles" => $this->getRoleNames(),
            "photo" => $this->photos()->exists() ? Storage::url($this->photos()->first()->path) : null,
            "created_at" => $this->created_at,
        ];
    }
}
