<?php

Route::apiResource('/question', 'QuestionController');

Route::apiResource('/category', 'CategoryController');

Route::apiResource('/question/{question}/reply', 'ReplyController');

Route::post('/like/{reply}', 'LikeController@LikeIt');
Route::delete('/like/{reply}', 'LikeController@unLikeIt');
