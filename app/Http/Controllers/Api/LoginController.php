<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;

class LoginController extends Controller
{
  use IssueTokenTrait;
    Private $client;
    public function _construct(){
        $this->client = Client::find(2);
    }
    public function login(Request $request){

        $this -> validate($request,[
            'email' => 'required:email',
            'password' => 'required'
        ]);

        return $this ->issueToken($request, 'password');
    }

    public function refresh(Request $request){
        $this->validate($request, [
           'refresh_token' => 'required'
        ]);
        return $this->issueToken($request, 'password');
    }
    public function logout(Request $request){
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken)
            ->update(['revoked' => true]);

        return response()->json(204);
    }
}
