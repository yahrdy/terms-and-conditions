<?php

namespace Hridoy\TermsAndConditions\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Hridoy\TermsAndConditions\Models\TermsAndConditions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TermsAndConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $termsAndConditions = TermsAndConditions::all();
        return response()->json(['data' => $termsAndConditions], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $termsAndConditions = TermsAndConditions::create($request->only('terms_and_conditions'));
        return response($termsAndConditions);
    }

    /**
     * Display the specified resource.
     *
     * @param TermsAndConditions $termsAndConditions
     * @return Response
     */
    public function show(TermsAndConditions $termsAndConditions): Response
    {
        return response($termsAndConditions);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TermsAndConditions $termsAndConditions
     * @return Response
     */
    public function update(Request $request, TermsAndConditions $termsAndConditions): Response
    {
        $termsAndConditions->update($request->only('terms_and_conditions'));
        return response($termsAndConditions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TermsAndConditions $termsAndConditions
     * @return Response
     * @throws Exception
     */
    public function destroy(TermsAndConditions $termsAndConditions): Response
    {
        $termsAndConditions->delete();
        return response($termsAndConditions);
    }
}
