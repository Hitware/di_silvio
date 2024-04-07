<?php

use GuzzleHttp\Client;

function prueba()
{
    $client = new Client();
    try {

        $response = $client->post('https://graph.facebook.com/v18.0/121757664363588/messages', [
            'headers' => [
                'Authorization' => 'Bearer EAAFKgDrNTTUBOzxOduMPOVJrLI9rd0xosvjL521Or9agL64eAtcdUnzoNOZCj0hcrjmaHR0xQyt5PWZBcFZBchZBFo3lf1GNB3hjiHVZAMKMq4b9cV2QfIdhcOUFlQKg91jZAOJnYG6FXjIcYQlBfiWpDhZBrhghfVroFXl87pMeZCdUvzzM12RZBcHrPVWFGAE8STNGfd9yRXMIZAVTAy',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => '573232260229',
                'type' => 'template',
                'template' => [
                    'name' => 'nueva_solicitud',
                    'language' => ['code' => 'ES'],
                ],
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
}

function getIdSolicitante(){
    $id_solicitante = auth()->user()->id;
    return $id_solicitante;
}
