<?php

namespace App\Http\Controllers\Api\v1;

use App\Action\UserAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function receive(UserAction $action, Request $request)
    {
        $freelancers = $action->handle(
            $request->get('name'), (int) $request->get('offset'), (int) $request->get('limit')
        );

        return UserResource::collection($freelancers);
    }
}