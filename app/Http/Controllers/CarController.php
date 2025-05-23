<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\App;
use App\Http\Requests\CarRequest;


class CarController extends Controller
{

    public function index(Request $request)
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

public function create()
{
    $owners = Owner::all();
    return view('cars.create', compact('owners'));
}

public function store(CarRequest  $request)
{
    $car = new Car();
    $car->reg_number = $request->reg_number;
    $car->brand = $request->brand;
    $car->model = $request->model;
    $car->owner_id = $request->owner_id;
    $car->save();

    return redirect()->route('cars.index');
}

public function edit(Car $car)
{
    $owners = Owner::all();
    return view('cars.edit', compact('car', 'owners'));
}

public function update(CarRequest  $request, Car $car)
{
    $car->reg_number = $request->reg_number;
    $car->brand = $request->brand;
    $car->model = $request->model;
    $car->owner_id = $request->owner_id;
    $car->save();

    return redirect()->route('cars.index');
}

public function destroy(Car $car)
{
    $car->delete();

    return redirect()->route('cars.index');
}
}
