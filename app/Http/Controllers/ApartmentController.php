<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApartmentController extends Controller
{
  public function index () {
    $apartments = Apartment::all();
    return Response::json($apartments);
  }

  public function show ($id) {
    $apartment = Apartment::find($id);
    return Response::json($apartment);
  }

  public function update (Request $request, $id) {
    $apartment = Apartment::find($id);
    $apartment->update($request->all());
    return Response::json(['updated' => true]);
  }

  public function create (Request $request) {
    $apartment = Apartment::create($request->all());
    return Response::json(['created' => true]);
  }

  public function destroy ($id) {
    $apartment = Apartment::find($id);
    $apartment->delete();
    return Response::json(['deleted' => true]);
  }
}
