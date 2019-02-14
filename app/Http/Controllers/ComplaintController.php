<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaint\StoreRequest;

use App\Complaint;

class ComplaintController extends Controller
{
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
