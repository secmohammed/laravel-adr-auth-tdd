<?php

Route::post('/change-password', \App\Users\Actions\ChangePasswordAction::class);
Route::get('/user', \App\Users\Actions\GetAuthenticatedUserAction::class);
Route::post('/logout', \App\Users\Actions\LogoutUserAction::class);
