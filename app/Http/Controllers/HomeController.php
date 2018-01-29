<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Home;
use App\Photo;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getAll()
    {
        $items = Home::all();// get all data
        $pics= new Photo();
        return View('home',compact('items','pics'));
    }
    public function delphotos($id)
    {
        $homes = photo::find($id);
        $homes->delete();
        return redirect()->back();
    }

    public function getpic($id)
    {
        $pics = DB::table('photos')
            ->where('home_id','=',$id)
            ->get();
        return View('home',compact('pics'));
    }

    public function link()
    {
        return View('add');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $newhome = new home();
            $newhome->desc = $request->input('desc');
            $newhome->nbpiece = $request->input('nbpiece');
            $newhome->etat = $request->input('etat');
            $newhome->gouv = $request->input('gouv');
            $newhome->ville = $request->input('ville');
            $newhome->rue = $request->input('rue');
            $newhome->save();
            $imgs= $request->file('image');
            $id = $newhome->id;
            if (is_array($imgs) || is_object($imgs)) {
                foreach ($imgs as $file) {
                    $newphotos = new Photo();
                    $newphotos->home_id = $id;
                    $newphotos->nomphoto = $file->getClientOriginalName();
                    $newphotos->save();
                    if ($newphotos->save()) {
                        $destinationpath = 'uploads';
                        $file->move($destinationpath, $newphotos->nomphoto);
                    }
                }
            }
            return view('add');
        }
    }

    public function delete(Request $request)
    {
        $id=$request->input('id');
        $homes = home::find($id);
        $homes->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $items = DB::table('homes')
            ->where('desc', 'like', '%'.$request->input('search').'%')
            ->orwhere('nbpiece', 'like', '%'.$request->input('search').'%')
            ->orwhere('etat', 'like', '%'.$request->input('search').'%')
            ->orwhere('gouv', 'like', '%'.$request->input('search').'%')
            ->orwhere('ville', 'like', '%'.$request->input('search').'%')
            ->orwhere('rue', 'like', '%'.$request->input('search').'%')
            ->get();
        return View('home',compact('items'));
    }

    public function edit(Request $request)
    {
        $id=$request->input('idhome');
        $description=$request->input('desc');
        $ville=$request->input('ville');
        $gouv=$request->input('gouv');
        $etat=$request->input('etat');
        $rue=$request->input('rue');
        $nb=$request->input('nb');
        $imgs =$request->file('images');

        DB::table('homes')->where('id', $id)
            ->update(['desc' =>$description,'nbpiece'=>$nb,'etat'=>$etat,'gouv' =>$gouv,'ville'=>$ville,'rue'=>$rue]);

        if (is_array($imgs) || is_object($imgs))
        {
            foreach ( $imgs as $f)
            {
                $newphotos = new Photo();
                $newphotos->home_id = $id;
                $newphotos->nomphoto = $f->getClientOriginalName();
                $newphotos->save();
                if ($newphotos->save())
                {
                    $destinationpath = 'uploads';
                    $f->move($destinationpath,$newphotos->nomphoto);
                }
            }
        }
        return redirect()->back();
    }
}
