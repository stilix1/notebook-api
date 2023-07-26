<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     schema="NotebookEntry",
 *     required={"full_name", "company", "phone", "email", "birthdate", "photo"},
 *     @OA\Property(property="full_name", type="string", example="FirstName SecondName"),
 *     @OA\Property(property="company", type="string", example="ABC Corp"),
 *     @OA\Property(property="phone", type="string", example="123-456-7890"),
 *     @OA\Property(property="email", type="string", example="test@test.com"),
 *     @OA\Property(property="birthdate", type="string", format="date", example="2000-01-01"),
 *     @OA\Property(property="photo", type="string", format="url", example="https://test.com/photo.jpg"),
 * )
 */

class NotebookEntry extends Model
{
    use HasFactory;

    protected $table = 'notebook_entries';

    protected $fillable = ['full_name', 'company', 'phone', 'email', 'birthdate', 'photo'];
}
