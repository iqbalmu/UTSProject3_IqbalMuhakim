<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getProfile()
    {
        $currentUser = auth()->user();
        $data = User::where('id_user', $currentUser->id_user)->with('pasien')->first();

        return new UserResource($data);
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $data = $request->validated();

        $currentUser = auth()->user();
        
        // email uniq check

        // phone uniq check

        // nik uniq check

        $data = User::where('id_user', $currentUser->id_user)->with('pasien')->first();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->validated();

        $currentUser = auth()->user();

        // cek password benar ?
        $matchPassword = Hash::check($data['password'], $currentUser->password);
        if (!$matchPassword) {
            throw new HttpResponseException(response([
                'errors' => "Wrong Password !!"
            ]));
        }

        // confirm new password
        if ($data['newPassword'] !== $data['confirmPassword']) {
            throw new HttpResponseException(response([
                'errors' => "Confirm password does not match"
            ]));
        }

        // update password
        $user = User::where('email', $currentUser->email)->first();
        $user->password = $data['newPassword'];
        $user->save();

        return response()->json([
            'message' => 'password updated'
        ]);
    }
}
