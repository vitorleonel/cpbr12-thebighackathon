<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaint\StoreRequest;

use App\City;
use App\Complaint;
use App\State;
use App\Type;

class ComplaintController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $types = Type::select(['id', 'name'])->get();
        $states = State::select(['id', 'name'])->get();
        $cities = City::select(['id', 'name'])->get();

        return response()->json([
            'types' => $types,
            'states' => $states,
            'cities' => $cities
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $complaint = Complaint::create($request->all());

        if(! $complaint) {
            return response()->json([
                'message' => 'Não foi possivel registrar sua denúncia. Tente novamente!'
            ], 400);
        }

        return response()->json([
            'message' => 'Denúncia registrada com sucesso!'
        ], 201);
    }
}
