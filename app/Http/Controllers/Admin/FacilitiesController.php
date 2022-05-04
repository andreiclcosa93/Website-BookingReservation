<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
{
    //listam setul de facilitati
    public function listFacilities()
    {
        $facilities = Facility::all()->sortby('order');
        return view('admin.facilites.list')
            ->with('facilities', $facilities);
    }

    //adaugam o noua facilitate
    public function createFacility(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'description' => ['max:500'],
                'order' => ['nullable', 'integer']
            ],
            [
                'name.required' => 'Trebuie sa introduceti o facilitate',
                'name:max' => 'Numele facilitatii nu poate avea mai mult de 100 de caractere',
                'order.integer' => 'Numarul de ordine trebuie sa fie intreg',
                'description.max' => 'descrierea nu poate avea mai mult de 500 de caractere'
            ]
        );

        $facility = new Facility;

        $facility->name = $request->name;
        $facility->order = $request->order;
        $facility->description = $request->description;

        if ($request->visible == 1) {
            $facility->visible = true;
        } else {
            $facility->visible = false;
        }

        $facility->save();

        return redirect()->back()->with('success', 'Facilitatea hotelului a fost adaugata');
    }

    //updatam o facilitate
    public function updateFacility(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'max:100'],
                'description' => ['max:500'],
                'order' => ['required', 'integer']
            ],
            [
                'name.required' => 'Trebuie sa introduceti o facilitate',
                'name:max' => 'Numele facilitatii nu poate avea mai mult de 100 de caractere',
                'order.integer' => 'Numarul de ordine trebuie sa fie intreg',
                'order.required' => 'Trebuie sa introduceti un numar de ordine',
                'description.max' => 'descrierea nu poate avea mai mult de 500 de caractere'
            ]
        );
        $facility = Facility::findOrfail($id);

        $facility->name = $request->name;
        $facility->order = $request->order;
        $facility->description = $request->description;

        if ($request->visible == 1) {
            $facility->visible = true;
        } else {
            $facility->visible = false;
        }

        $facility->save();
        return redirect()->back()->with('success', 'Facilitatea hotelului a fost updatata');
    }

    public function deleteFacility($id)
    {
        $facility = Facility::findOrfail($id)->delete();
        return redirect()->back()->with('success', 'Facilitatea a fost stearsa');
    }
}
