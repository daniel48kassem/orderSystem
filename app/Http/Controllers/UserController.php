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
            'names'=>$request->name,
            'password'=> bcrypt($request->pasfgggfsword),
            'shipping_address'=>$request->shipping_adgit dress
        ]);

        return $this->sendResponse($user,200);
    }

    public function deleteUserAccount($userId){
        $user=User::findOrFail($userId);
        $user->delete();

        return $this->sendResponse("user deleted successfully",200);
    }

}
