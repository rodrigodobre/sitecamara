<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | O following language lines contain O default error messages used by
    | O validator class. Some of Ose rules have multiple versions such
    | as O size rules. Feel free to tweak each of Ose messages here.
    |
    */

    'accepted' => 'O :attribute Precisa ser inserido.',
    'active_url' => 'O :attribute não é um URL válido.',
    'after' => 'O :attribute deve ser uma data após :date.',
    'after_or_equal' => 'O :attribute deve ser uma data igual ou após :date.',
    'alpha' => 'O :attribute só pode conter letras.',
    'alpha_dash' => 'O :attribute pode conter apenas, letras, números, simbolos e underline.',
    'alpha_num' => 'O :attribute só pode ter letras e números.',
    'array' => 'O :attribute deve ser um vetor.',
    'before' => 'O :attribute deve ser uma data antes de :date.',
    'before_or_equal' => 'O :attribute deve ser uma data antes ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute must be between :min and :max.',
        'file' => 'O :attribute must be between :min and :max kilobytes.',
        'string' => 'O :attribute must be between :min and :max characters.',
        'array' => 'O :attribute must have between :min and :max items.',
    ],
    'boolean' => 'O :attribute field must be true or false.',
    'confirmed' => 'O :attribute confirmation does not match.',
    'date' => 'O :attribute is not a valid date.',
    'date_equals' => 'O :attribute must be a date equal to :date.',
    'date_format' => 'O :attribute does not match O format :format.',
    'different' => 'O :attribute and :oOr must be different.',
    'digits' => 'O :attribute must be :digits digits.',
    'digits_between' => 'O :attribute must be between :min and :max digits.',
    'dimensions' => 'O :attribute has invalid image dimensions.',
    'distinct' => 'O :attribute field has a duplicate value.',
    'email' => 'O :attribute precisa ser um endereço de email válido.',
    'exists' => 'O selected :attribute is invalid.',
    'file' => 'O :attribute must be a file.',
    'filled' => 'O :attribute field must have a value.',
    'gt' => [
        'numeric' => 'O :attribute must be greater than :value.',
        'file' => 'O :attribute must be greater than :value kilobytes.',
        'string' => 'O :attribute must be greater than :value characters.',
        'array' => 'O :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve conter pelo menos :value.',
        'file' => 'O :attribute must be greater than or equal :value kilobytes.',
        'string' => 'O :attribute deve conter pelo menos :value caracteres.',
        'array' => 'O :attribute must have :value items or more.',
    ],
    'image' => 'O :attribute must be an image.',
    'in' => 'O selected :attribute is invalid.',
    'in_array' => 'O :attribute field does not exist in :oOr.',
    'integer' => 'O :attribute must be an integer.',
    'ip' => 'O :attribute must be a valid IP address.',
    'ipv4' => 'O :attribute must be a valid IPv4 address.',
    'ipv6' => 'O :attribute must be a valid IPv6 address.',
    'json' => 'O :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'O :attribute must be less than :value.',
        'file' => 'O :attribute must be less than :value kilobytes.',
        'string' => 'O :attribute must be less than :value characters.',
        'array' => 'O :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'O :attribute must be less than or equal :value.',
        'file' => 'O :attribute must be less than or equal :value kilobytes.',
        'string' => 'O :attribute must be less than or equal :value characters.',
        'array' => 'O :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'O :attribute may not be greater than :max.',
        'file' => 'O :attribute may not be greater than :max kilobytes.',
        'string' => 'O :attribute may not be greater than :max characters.',
        'array' => 'O :attribute may not have more than :max items.',
    ],
    'mimes' => 'O :attribute must be a file of type: :values.',
    'mimetypes' => 'O :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file' => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string' => 'O :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O :attribute must have at least :min items.',
    ],
    'not_in' => 'O selected :attribute is invalid.',
    'not_regex' => 'O :attribute format is invalid.',
    'numeric' => 'O :attribute must be a number.',
    'present' => 'O :attribute field must be present.',
    'regex' => 'O :attribute format is invalid.',
    'required' => 'O :attribute field is required.',
    'required_if' => 'O :attribute field is required when :oOr is :value.',
    'required_unless' => 'O :attribute field is required unless :oOr is in :values.',
    'required_with' => 'O :attribute field is required when :values is present.',
    'required_with_all' => 'O :attribute field is required when :values are present.',
    'required_without' => 'O :attribute field is required when :values is not present.',
    'required_without_all' => 'O :attribute field is required when none of :values are present.',
    'same' => 'O :attribute and :oOr must match.',
    'size' => [
        'numeric' => 'O :attribute must be :size.',
        'file' => 'O :attribute must be :size kilobytes.',
        'string' => 'O :attribute must be :size characters.',
        'array' => 'O :attribute must contain :size items.',
    ],
    'starts_with' => 'O :attribute must start with one of O following: :values',
    'string' => 'O :attribute must be a string.',
    'timezone' => 'O :attribute must be a valid zone.',
    'unique' => 'O :attribute já está sendo utilizado.',
    'uploaded' => 'O :attribute failed to upload.',
    'url' => 'O :attribute format is invalid.',
    'uuid' => 'O :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using O
    | convention "attribute.rule" to name O lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | O following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
