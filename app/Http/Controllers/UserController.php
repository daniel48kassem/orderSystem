<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDetailsRequest;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function update(UpdateUserDetailsRequest $request){
        $userId=Auth('api')->user()->id;
        $user=User::findOrFail($userId);

        $user->update([
            'name'=>$request->name,
            'password'=> bcrypt($request->password),
            'shipping_address'=>$request->shipping_address
        ]);

        return $this->sendResponse($user,200);
    }

    public function deleteUserAccount($userId){
        $user=User::findOrFail($userId);
        $user->delete();

        return $this->sendResponse("user deleted successfully",200);
    }

}
