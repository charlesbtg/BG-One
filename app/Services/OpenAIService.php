<?php

namespace App\Services;

use OpenAI\Client;
use Exception;

class OpenAIService
{
    protected Client $client;
    protected string $model;

    public function __construct()
    {
        $this->client = Client::configure()
            ->setApiKey(config('services.openai.key'));

        $this->model = config('services.openai.model');
    }

    public function chat(array $messages): array
    {
        $response = $this->client
            ->chat()
            ->create([
                'model'    => $this->model,
                'messages' => $messages,
            ]);

        if (! isset($response['choices'][0]['message']['content'])) {
            throw new Exception('OpenAI did not return a valid response.');
        }

        return $response->toArray();
    }
}
