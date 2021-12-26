<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Category;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendindex()
    {
        $owners=Owner::all();
        $categories=Category::all();
        return view('backend.manage_owner',compact(['owners','categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendcreate()
    {
        return view('backend.manage_owner');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function backendstore(StoreOwnerRequest $request)
    {
        $this->validate($request,[
            'owner_name'=>'required|max:250',
            'company_name'=>'required|max:250',
            'owner_email'=>'required|max:250',
            'company_email'=>'required|max:250',
            'password'=>'required|max:250',
            'desc'=>'required|max:250',
            'num_of_employees'=>'required|max:250',
            'address'=>'required|max:250',
           'logo'=>'required|mimes:jpeg,png,gif,jpg',
          ]);
          if($request->hasFile('logo')){
              $file=$request->logo;
              $new_file=time().$file->getClientOriginalName();
              $file->move('storage/owner_images/',$new_file);
          }
          
          Owner::create([
              "owner_name"=>$request->owner_name,
              "company_name"=>$request->company_name,
              "owner_email"=>$request->owner_email,
              "company_email"=>$request->company_email,
              "password"=>$request->password,
              "desc"=>$request->desc,
              "num_of_employees"=>$request->num_of_employees,
              "address"=>$request->address,
              "category_id"=>$request->category,
              "logo"=>'storage/owner_images/'.$new_file

         ]);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function backendshow(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function backendedit($id)
    {
        $owner=Owner::find($id);
        $categories=Category::all();
        return view('backend.updates.owner_update',compact(['owner', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function backendupdate(UpdateOwnerRequest $request, $id)
    {
        $owner=Owner::find($id);
        if($request->hasFile('logo')){
            $file=$request->logo;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/owner_images/',$new_file);
            $owner->logo='storage/owner_images/'.$new_file;
        }
        
            $owner->owner_name=$request->owner_name;
            $owner->company_name=$request->company_name;
            $owner->owner_email=$request->owner_email;
            $owner->company_email=$request->company_email;
            $owner->password=$request->password;
            $owner->desc=$request->desc;
            $owner->num_of_employees=$request->num_of_employees;
            $owner->address=$request->address;
            $owner->category_id=$request->category; 
            $owner->update();

       
            return redirect()->route('owner.index');


            // $category=Category::find($id);
            // if($request->hasFile('image')){
            //     $file=$request->image;
            //     $new_file=time().$file->getClientOriginalName();
            //     $file->move('storage/category_images/',$new_file);
            //     $category->image='storage/category_images/'.$new_file;
            // }
            // $category->name=$request->name;
            
    
            // $category->update();
            // return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function backenddestroy($request)
    {
        $owner=Owner::find($request);
        $owner->delete(); 
        // return $category;
        // $category=Category::find($id);
        // $category->delete();
        
        return redirect()->route('owner.index');
    }
}
