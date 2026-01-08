<?php

return [

    'min' => [
        'string' => 'La :attribute debe tener al menos :min caracteres.',
        'numeric' => 'La :attribute debe ser al menos :min.',
        'file' => 'El archivo :attribute debe tener al menos :min kilobytes.',
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
    ],

    'max' => [
        'string' => 'La :attribute no debe tener más de :max caracteres.',
        'numeric' => 'La :attribute no debe ser mayor que :max.',
        'file' => 'El archivo :attribute no debe ser mayor que :max kilobytes.',
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
    ],

    'required' => 'La :attribute es obligatoria.',
    'email' => 'El :attribute debe ser una dirección de correo válida.',
    'confirmed' => 'Las contraseñas no coinciden.',
    'unique' => 'El :attribute ya está en uso.',
    'numeric' => 'El :attribute debe ser un número.',
    'string' => 'El :attribute debe ser una cadena de texto.',
    'array' => 'El :attribute debe ser un array.',

    'attributes' => [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'username' => 'usuario',
    ],
];
