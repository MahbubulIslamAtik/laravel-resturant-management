<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\FoodChef;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function user(){
        $user=user::all();
        return view("admin.users", compact("user"));
    }

    public function deleteuser($id){
        $user=user::find($id);
        $user->delete();
        return redirect()->back();

    }

    public function foodmanu(){
        $data=food::all();
        return view("admin.foodmanu", compact('data'));
    }

    public function deletemanu($id){
        $foods=food::find($id);
        $foods->delete();
        return redirect()->back();
    }

    public function updateview($id){
        $data = food::find($id);
        return view("admin.updateview", compact("data"));
    }

    public function update(Request $request, $id){
        $data = food::find($id);

        $data->titls=$request->txtTitle;
        $data->price=$request->txtPrice;
        if($request->hasfile('txtImage')){
            $file = $request->file('txtImage');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/foods', $filename);
            $data->image = $filename;
        }        
        //$data->image = $request->txtImage;
        $data->description=$request->txtDescription;
        $data->save();
        return redirect()->back();
    }

    public function upload(Request $request){
        $data = new Food;
        $data->titls=$request->txtTitle;
        $data->price=$request->txtPrice;
        if($request->hasfile('txtImage')){
            $file = $request->file('txtImage');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/foods', $filename);
            $data->image = $filename;
        }        
        //$data->image = $request->txtImage;
        $data->description=$request->txtDescription;
        $data->save();
        return redirect()->back();
    }

    public function reservation(Request $request){
        $data = new Reservation;

        $data->name=$request->name;
        $data->email=$request->email;            
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }

    public function viewreservation(){
        if(Auth::id()){
            $data2 = reservation::all();
            return view("admin.adminreservation", compact("data2"));
        }else{
            return redirect('login');
        }
        
    }

    public function viewchef(){
        $data=foodchef::all();
        return view("admin.adminchef", compact("data"));
    }

    public function uploadchef(Request $request){
        $data = new FoodChef;

        $data->name=$request->name;
        $data->speciality=$request->speciality;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/chefs', $filename);
            $data->image = $filename;
        }        
        $data->save();
        return redirect()->back();
    }

    
    public function deletechef($id){
        $chef=foodchef::find($id);
        $chef->delete();
        return redirect()->back();
    }

    public function updatechef($id){
        $data=foodchef::find($id);
        return view("admin.updatechef", compact("data"));
    }

    public function updatefoodchef(Request $request, $id){
        $data = foodchef::find($id);;

        $data->name=$request->name;
        $data->speciality=$request->speciality;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/chefs', $filename);
            $data->image = $filename;
        }        
        $data->save();
        return redirect()->back();
    }

    public function orders(){
        $data=order::all();
        return view("admin.orders", compact('data'));
    }

    public function search(Request $request){
        $search = $request->search;
        $data=order::where('name', 'Like', '%'.$search.'%')->orwhere('foodname', 'Like', '%'.$search.'%')->get();
        return view("admin.orders", compact('data'));
    }
}
