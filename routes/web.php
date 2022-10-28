<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\LazyCollection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/lazy', function () {
    // $collection = Collection::times(10000000)
    //     ->map(function($number){
    //         return pow(2,$number);
    //     })
    //     ->all();

    $collection = LazyCollection::times(10000000)
        ->map(function($number){
            return pow(2,$number);
        })
        ->all();

    return 'Done';
});

/// Generator in php how it works

Route::get('/generator', function () {

    function happyFunction()
    {
        dump(1);
        yield 'one';
        dump(2);
        yield 'two';
        dump(3);
        yield 'three';
        dump(4);
        yield 'Four';
    }

    ## WITHOUT FOREACH LOOP EXAMPLE

    //$return = happyFunction();

    // dump($return->current());

    // $return->next();

    // dump($return->current());

    // $return->next();

    // dump($return->current());

    // $return->next();

    // dump($return->current());

    // $return->next();

    // dump($return->current());


    ## WITH FOREACH LOOP EXAMPLE

    // foreach(happyFunction() as $result)
    // {
    //     if($result == 'two')
    //     {
    //         return;
    //     }

    //     dump($result);
    // }

});



Route::get('/generator2', function () {

    function notHappyFunction($number)
    {
        $return = [];

        for($i = 1; $i < $number; $i++)
        {
            $return[] = $i;
        }

        return $return;
    }

    foreach(notHappyfunction(10000000) as $number)
    {
        if($number % 1000 == 0)
        {
            dump('hello');
        }
    }
});

