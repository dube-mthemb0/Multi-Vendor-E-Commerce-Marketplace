<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
  public function parent():BelongsTo
  {
      return $this->BelongsTo(Category::class, 'parent_id');
  }
}
