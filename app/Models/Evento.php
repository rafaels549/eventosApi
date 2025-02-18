<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Evento extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'data_evento', 'user_id', 'imagem'
    ];

    public static function validate($data)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
            'imagem' => 'nullable|image|max:2048'
        ];

        return Validator::make($data, $rules);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
