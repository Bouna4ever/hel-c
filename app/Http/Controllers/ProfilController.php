<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use Exception;
use Illuminate\Http\JsonResponse;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils = Profil::where('status', 'actif')->get();

        if (!auth('sanctum')->check()) {
            $profils->makeHidden(['status']);
        }

        return $profils;
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
    public function store(StoreProfilRequest $profilRequest) : JsonResponse
    {
        try {
            $profilData = $profilRequest->validated();
            $profil = Profil::create($profilData);

            return response()->json([
                "profil" => $profil,
            ], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilRequest $profilRrequest, Profil $profil) : JsonResponse
    {
        try {
            $profilData = $profilRrequest->validated();

            $profil->update($profilData);

            return response()->json([
                "profil" => $profil,
            ], 200);
        } catch (Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil) : JsonResponse
    {
        try {
            $profil->delete();
            return response()->json(["message" => "Supprimé"], 204);
        } catch (Exception $exception) {
            return response()->json(["message" => $exception->getMessage()], 400);
        }
    }
}
