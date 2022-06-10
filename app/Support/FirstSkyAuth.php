<?php

namespace Azuriom\Support;

use Azuriom\Models\Role;
use Azuriom\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FirstSkyAuth {

    private const AUTO_AUTH_ROLE_ID = 1;

    public static function autoAuth(string $name): bool
    {
        /** @var Collection $users */
        $users = User::where('name', $name)->get();

        if ($users->isNotEmpty()) {
            /** @var User $user */
            $user = $users->first();

            /** @var Role $role */
            $role = $user->role()->get()->first();

            if ($role->id = self::AUTO_AUTH_ROLE_ID && $role->is_admin === false) {
                Auth::guard()->login($user);
                return true;
            }

            return false;
        }

        $user = User::create([
            'name' => $name,
            'email' => Str::random(3)."$name@dummy.dummy",
            'password' => Hash::make(Str::random(32)),
            'game_id' => null,
        ]);

        Auth::guard()->login($user);
        return true;
    }

}
