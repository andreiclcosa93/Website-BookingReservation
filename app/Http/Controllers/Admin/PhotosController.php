<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PhotosController extends Controller
{
    public function editPhotos($id)
    {
        $room=Room::findOrFail($id);
        return view('admin.photos.edit')
                ->with('room',$room);
    }

    public function uploadPhotos(Request $request, $id)
    {
        //validare date upload photo
        $request->validate(
            [
            'photo'=>'required|image|max:1024',
            'info'=>'nullable|max:255',
            'order'=>'integer'
        ],
        [
            'photo.max'=>'imaginea nu poate avea mai mult de 1 MB',
            'photo.required'=>'Trebuie sa selectati o imagine',
            'info.max'=>'Info pentru imagine maximum 255 caractere',
        ]);

        $room_id=Room::findOrFail($id);
        // dd($room_id);

        $photo = new Photo;

        $photo->room_id=$room_id->id;

        if ($request->hasFile('photo'))
        {
            //salvam poza pe hard disk
            $extension = $request->file('photo')->getClientOriginalExtension();
            $name='photo_' . time() . '.' . $extension;

            $request->file('photo')->move('images/galery',$name);

            $photo->photo=$name;

        }
        $photo->info=$request->info;
        // $photo->order=$request->order;

        $room=Room::findOrFail($id);
        $order_max=$room->photos()->max('order');
        $photo->order=$order_max + 10;


        if($request->visible==1)
        {
            $photo->visible = true;
        } else
        {
            $photo->visible=false;
        }

        $photo->save();
        return redirect()->back()->with('success', 'Imaginea a fost adaugata in galeria foto');



    }

    public function updatePhotos(Request $request,$id)
    {

         //validare date update  photo
         $request->validate(
            [
            'photo'=>'nullable|image|max:1024',
            'info'=>'nullable|max:255',
            'order'=>'integer'
        ],
        [
            'photo.max'=>'imaginea nu poate avea mai mult de 1 MB',
            'info.max'=>'Info pentru imagine maximum 255 caractere',
        ]);

        $photo=Photo::findOrFail($id);

        if ($request->hasFile('photo'))
        {
            //verificam daca Photo  are o imagine setata

            if(isset($photo->photo))
{
                if(File::exists($photo->photoPath()))
                {
                    File::delete($photo->photoPath());
                }
            }


            //salvam poza pe hard disk
            $extension = $request->file('photo')->getClientOriginalExtension();
            $name='galery_' . time() . '.' . $extension;

            $request->file('photo')->move('images/galery',$name);

            $photo->photo=$name;


        }
        $photo->info=$request->info;
        $photo->order=$request->order;

        if($request->visible==1)
        {
            $photo->visible = true;
        } else
        {
            $photo->visible=false;
        }

        $photo->save();
        return redirect()->route('admin.rooms.photos.edit',$photo->room->id)->with('success', 'Imaginea a fost updatata in galeria foto');



    }

    public function deletePhotos($id)
    {
        $photo=Photo::findOrFail($id)->delete();
        return redirect()->route('admin.rooms.photos.edit')->with('success','Imaginea a fost stearsa din baza date');
    }


}
