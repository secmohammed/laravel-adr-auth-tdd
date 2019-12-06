<?php
Route::post('/register',\App\Users\Actions\RegisterUserAction::class);
Route::post('/login',\App\Users\Actions\LoginUserAction::class);
Route::get('activate/resend/{user}',\App\Users\Actions\ResendActivationUserAccountAction::class);
Route::get('/activate/{user}/{token}', \App\Users\Actions\ActivateUserAccountAction::class);
Route::post('/forgot-password', \App\Users\Actions\ForgotUserPasswordAction::class);
Route::get('/reset-password/{user}/{token}', \App\Users\Actions\ValidateUserPasswordResetTokenAction::class);
Route::post('/reset-password/{user}/{token}', \App\Users\Actions\ResetUserPasswordAction::class);
Route::get('titles',\App\Users\Actions\IndexTitlesAction::class);
