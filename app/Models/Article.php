<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int|string|null $userId)
 * @method static paginate(mixed $nombreArticles)
 */
class Article extends Model
{
    use HasFactory;
}
