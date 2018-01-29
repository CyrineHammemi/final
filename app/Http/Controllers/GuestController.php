<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Database\Query\Builder;
use App\Photo;

use App\Home;
class GuestController extends Controller
{
    public function show ()
    {
        $pics = DB::table('photos')
            ->join('homes', 'homes.id', '=', 'photos.home_id')
            ->select('photos.*')
            ->where('etat', '=', 'En Construction')
            ->get();
        $homes = Home::all();
        $tab[]="";
        $i=0;
        foreach($homes as $myhome)
        {
            $tab[$i]=$myhome;
            $i++;
        }
        return View('welcome',compact('pics','homes','tab'));

        //$homes = Home::with(["photos"])->all();

        //$homes = Home::All();
        /*$homes = DB::table('photos')
                ->join('homes','homes.id','=','photos.home_id')
                ->get();*/
        /*
        $homes = DB::table('photos')
            ->join('homes', 'homes.id', '=', 'photos.home_id')
            ->select('photos.*')
            ->select('homes.*')
            ->get();*/
        /*
                foreach ($homes as $home)
                {
                    $result=array($home->gouv,$home->rue ,$home->desc ,$home->ville,[function(){
                        $photos = DB::table('photos')
                            ->join('homes', 'homes.id', '=', 'photos.home_id')
                            ->select('photos.*')
                            ->where('photos.home_id','=','1')
                            ->get();
                        return ($photos);
                    }] );

                }*/
        //$user = DB::table('')->where('name', 'John')->first();
        //$pics=Photo::all();
        //$hoems = Home::all();
        //$homes = Home::with('photos')->get();
        // $gallery = DB::table('photos')->where('id_home', $ones->id);
        //return view('welcome',compact('pics','ones'));
        //$homes = Home::orderBy('id')->with('photos')->get();
        //return view('welcome',compact('pics','homes'));
        // $homes = Home::orderBy('id')->with('photos')->get();
        //->with(array('homes' => $homes));
        //return View::make('home.index')->with(array('homes' => $homes));
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
        return redirect()->back()->with('items',$items);
    }

    public function mail(Request $request)
    {
        $this->validate($request,['email'=>'required|email','body'=>'min:10','object'=>'min:3']);

        $body = $request->input('body');
        $name =$request->input('name');
        $email = $request->input('email');
        $subject= $request->input('object');
        $data=['msg'=>$body,'name'=>$name,'email'=>$email,'subject'=>$subject];

        Mail::send('emails.contact',$data,function($message)use ($data){

            $message->from($data['email']);
            $message->to('grpprojetand@gmail.com');
            $message->subject($data['msg']);

        });

        return redirect()->back();
    }

    public function plus(Request $request)
    {
        $id = $request->input('count');
        $data = DB::table('home')
            ->where('homes.id', '=', $id)
            ->get();
        return View('plus',compact('data'));
    }

}
