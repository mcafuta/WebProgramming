<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute mora biti sprejet.',
    'active_url'           => ':attribute ni veljaven URL.',
    'after'                => ':attribute mora biti datum po :date.',
    'alpha'                => ':attribute lahko vsebuje samo crke.',
    'alpha_dash'           => ':attribute lahko vsebuje samo crke, stevilke in pomisljaje.',
    'alpha_num'            => ':attribute lahko vsebuje samo crke in stevilke.',
    'array'                => ':attribute mora biti tabela.',
    'before'               => ':attribute mora biti datum pred :date.',
    'between'              => [
        'numeric' => ':attribute mora biti med :min in :max.',
        'file'    => ':attribute mora biti med :min in :max kilobyte-i.',
        'string'  => ':attribute mora biti med :min in :max znaki.',
        'array'   => ':attribute mora vsebovati med :min in :max predmetov.',
    ],
    'boolean'              => 'Vrednost polja :attribute mora biti true ali false.',
    'confirmed'            => 'Potrjevanje :attribute se ne ujema.',
    'date'                 => ':attribute ni veljaven datum.',
    'date_format'          => ':attribute se ne ujema s formatom :format.',
    'different'            => ':attribute in :other morata biti razlicna.',
    'digits'               => ':attribute mora biti :digits stevk.',
    'digits_between'       => ':attribute mora biti med :min in :max stevkami.',
    'dimensions'           => ':attribute je neveljavnih dimenzij.',
    'distinct'             => 'Polje :attribute ima duplikat.',
    'email'                => ':attribute mora biti veljaven e-mail naslov.',
    'exists'               => 'Izbrana moznost :attribute je neveljavna.',
    'file'                 => ':attribute mora biti dokument.',
    'filled'               => 'Polje :attribute je zahtevano.',
    'image'                => ':attribute mora biti slika.',
    'in'                   => 'Izbrana moznost :attribute je neveljavna.',
    'in_array'             => ':attribute ne obstaja v :other.',
    'integer'              => ':attribute mora biti pozitivno celo stevilo.',
    'ip'                   => 'attribute mora biti veljaven IP naslov.',
    'json'                 => ':attribute mora biti veljaven JSON niz.',
    'max'                  => [
        'numeric' => ':attribute ne sme presegati :max.',
        'file'    => ':attribute ne sme presegati :max kilobytov.',
        'string'  => ':attribute ne sme presegati :max znakov.',
        'array'   => ':attribute ne sme vsebovati vec kot :max predmetov.',
    ],
    'mimes'                => ':attribute mora biti dokument tipa: :values.',
    'mimetypes'            => ':attribute mora biti dokument tipa: :values.',
    'min'                  => [
        'numeric' => ':attribute ne sme biti manjsi od :min.',
        'file'    => ':attribute ne sme biti manjsi od :min kilobytov.',
        'string'  => ':attribute ne sme biti manjsi od :min znakov.',
        'array'   => ':attribute mora vsebovati najmanj :min predmetov.',
    ],
    'not_in'               => 'Izbrana moznost :attribute je neveljavna.',
    'numeric'              => ':attribute mora biti stevilo.',
    'present'              => ':attribute mora biti prisoten.',
    'regex'                => 'Format :attribute je neveljaven.',
    'required'             => 'Polje :attribute je zahtevano.',
    'required_if'          => 'Polje :attribute je zahtevano ko je :other :value.',
    'required_unless'      => 'Polje :attribute je zahtevano razen ce je :other v :values.',
    'required_with'        => 'Polje :attribute je zahtevano ko je prisotno :values.',
    'required_with_all'    => 'Polje :attribute je zahtevano ko je prisotno :values.',
    'required_without'     => 'Polje :attribute je zahtevano ko ni prisotno :values.',
    'required_without_all' => 'Polje :attribute je zahtevano ko ni prisotno nic od :values.',
    'same'                 => ':attribute in :other se morata ujemati.',
    'size'                 => [
        'numeric' => ':attribute mora biti :size.',
        'file'    => ':attribute mora biti velikosti :size kilobytov.',
        'string'  => ':attribute mora vsebovati :size znakov.',
        'array'   => ':attribute mora vsebovati :size predmetov.',
    ],
    'string'               => ':attribute mora biti niz.',
    'timezone'             => ':attribute mora biti v veljaven casovni pas.',
    'unique'               => ':attribute ze obstaja.',
    'uploaded'             => ':attribute se ni uspesno nalozil.',
    'url'                  => 'Format :attribute je neveljaven.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
