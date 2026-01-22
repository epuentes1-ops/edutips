<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Service Provider (SP) Configuration
    |--------------------------------------------------------------------------
    */
    'sp' => [
        // Entity ID del SP (tu aplicación Laravel)
        'entityId' => env('SAML2_SP_ENTITYID', 'https://edutips.ucompensar.edu.co/saml/metadata'),

        // URL donde Azure enviará la respuesta SAML
        'assertionConsumerService' => [
            'url' => env('SAML2_SP_ACS', 'https://edutips.ucompensar.edu.co/saml/acs'),
        ],

        // Endpoint para Single Logout (opcional)
        'singleLogoutService' => [
            'url' => env('SAML2_SP_SLS', 'https://edutips.ucompensar.edu.co/saml/logout'),
        ],

        // Configuración del certificado del SP si usas firma (no obligatorio en local)
        'x509cert' => '',
        'privateKey' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Identity Provider (IdP) Configuration - Microsoft Entra ID
    |--------------------------------------------------------------------------
    */
    'idp' => [
        // EntityID de Microsoft (del metadata XML)
        'entityId' => env(
            'SAML2_IDP_ENTITYID',
            'https://sts.windows.net/4bf38ea2-832d-4552-b508-421570da43ff/'
        ),

        // Endpoint de Login SAML proporcionado por Azure
        'singleSignOnService' => [
            'url' => env(
                'SAML2_IDP_SSO_URL',
                'https://login.microsoftonline.com/4bf38ea2-832d-4552-b508-421570da43ff/saml2'
            ),
        ],

        // Endpoint de Logout (opcional)
        'singleLogoutService' => [
            'url' => env(
                'SAML2_IDP_SLO_URL',
                'https://login.microsoftonline.com/4bf38ea2-832d-4552-b508-421570da43ff/saml2'
            ),
        ],

        // Ruta del certificado X.509 que te entregó TI
        'x509cert' => file_exists(storage_path('saml/idp_certificate.pem'))
            ? file_get_contents(storage_path('saml/idp_certificate.pem'))
            : '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Opciones de validación y seguridad
    |--------------------------------------------------------------------------
    */
    'security' => [

        'authnRequestsSigned' => false,
        'wantAssertionsSigned' => true,
        'wantMessagesSigned' => false,

        'requestedAuthnContext' => false,

        'lowercaseUrlencoding' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Rutas internas del paquete
    |--------------------------------------------------------------------------
    */
    'routes' => [
        'prefix' => 'saml',
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug
    |--------------------------------------------------------------------------
    */
    'debug' => env('APP_DEBUG', false),
];
