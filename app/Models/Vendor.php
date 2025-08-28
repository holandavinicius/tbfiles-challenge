<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $vat_number
 * @property int $payment_terms
 */
class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'vat_number', 'payment_terms'];
}
