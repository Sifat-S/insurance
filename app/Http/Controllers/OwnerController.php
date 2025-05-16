<?php namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OwnerController extends Controller
{
public function index(): View
{
$owners = Owner::all();
return view('owners.index', compact('owners'));
}

public function create(): View
{
return view('owners.create');
}

public function store(Request $request): RedirectResponse
{
$request->validate([
'name' => 'required|string|max:255',
'surname' => 'required|string|max:255',
'phone' => 'required|string|max:20',
'email' => 'required|email|unique:owners',
'address' => 'required|string',
]);

Owner::create($request->all());

return redirect()->route('owners.index')->with('success', 'Owner added successfully');
}

public function edit(Owner $owner): View
{
return view('owners.edit', compact('owner'));
}

public function update(Request $request, Owner $owner): RedirectResponse
{
$request->validate([
'name' => 'required|string|max:255',
'surname' => 'required|string|max:255',
'phone' => 'required|string|max:20',
'email' => 'required|email|unique:owners,email,' . $owner->id,
'address' => 'required|string',
]);

$owner->update($request->all());

return redirect()->route('owners.index')->with('success', 'Owner updated successfully');
}

public function destroy(Owner $owner): RedirectResponse
{
$owner->delete();

return redirect()->route('owners.index')->with('success', 'Owner deleted successfully');
}
}
