<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\JsonResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    
    public function index():Factory|View|Application
    {
        return view('users.index',[
            'users' => User::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return JSonResponse
     * @param  User $user
     */
    public function destroy(User $user):JsonResponse
    {
try{
        $user->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
    catch (Exception $e){
        return response()->json([
            'status' => 'error',
            'message' => 'Wystąpił błąd'
        ])->setStatusCode(500);
    }
        //
    }
}
