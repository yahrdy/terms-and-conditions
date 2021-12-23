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
     * @return Response
     */
    public function show($termsAndConditions): Response
    {
        $termsAndConditions = TermsAndConditions::findOrFail($termsAndConditions);
        return response($termsAndConditions);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $termsAndConditions): Response
    {
        $termsAndConditions = TermsAndConditions::findOrFail($termsAndConditions);
        $termsAndConditions->update($request->only('terms_and_conditions'));
        return response($termsAndConditions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     * @throws Exception
     */
    public function destroy($termsAndConditions): Response
    {
        $termsAndConditions = TermsAndConditions::findOrFail($termsAndConditions);
        $termsAndConditions->delete();
        return response($termsAndConditions);
    }
}
