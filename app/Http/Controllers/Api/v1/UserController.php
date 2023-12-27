<?php

namespace App\Http\Controllers\Api\v1;

use App\Action\UserAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function receive(UserAction $action, Request $request): JsonResponse
    {
        $freelancers = $action->handle(
            $request->get('name'), (int) $request->get('offset'), (int) $request->get('limit')
        );

        return response()->json($freelancers);
    }
}
