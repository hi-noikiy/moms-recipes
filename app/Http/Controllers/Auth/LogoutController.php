<?php

namespace App\Http\Controllers\Auth;

use Lcobucci\JWT\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = auth()->user()->tokens->find($id);
        $token->revoke();

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $token->id)
            ->update([
                'revoked' => true
            ]);
        
        return response(200);
    }
}
