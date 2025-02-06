<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait IssueTokenTrait{
    public function issueToken(Request $request, $grantType, $scope = "")
    {
        // Check if $this->client is null
        if (!$this->client) {
            throw new \Exception('Client is not initialized');
        }

        $params = array(
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => $scope
        );

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }



}

