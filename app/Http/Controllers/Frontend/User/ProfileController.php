<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Jenssegers\Agent\Agent;

/**
 * Class ProfileController.
 */
class ProfileController
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {
        $agent = new Agent();
        $userService->updateProfile($request->user(), $request->validated());

        // if (session()->has('resent')) {

        //     return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));

        // }
        if($agent->isMobile()){
            return redirect()->route('frontend.profile.edit')->withFlashSuccess(__('Profile successfully updated.'));
        }else{
            return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
        }

    }
}
