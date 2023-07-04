<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPaymentCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => decrypt($this->name),
            'number' => '***********'.decrypt($this->last_four_numbers),
            'card_type' => $this->type,
        ];
    }
}
