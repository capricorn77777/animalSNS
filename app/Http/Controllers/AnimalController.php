<?php
// app/Http/Controllers/AnimalController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'species' => 'required|string',
            'gender' => 'required|string',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $animal->update([
            'species' => $request->species,
            'gender' => $request->gender,
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $animal->update([
                'profile_image' => 'images/' . $imageName,
            ]);
        }

        //return redirect()->route('animals.show', $animal);
        return redirect()->back()->with('success', 'Animal updated successfully');

    }
}
