<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "Hello";
        $categories=Category::get();

        // session()->forget('message');
        // dd(session('message'));
        return view('Category.index',compact('categories'));    //->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required |unique:categories,name',
            'description'=>'required|min:10',
        ]);

        /*$category= new Category;

        $category->name= $request->name;
        $category->description=$request->description;

        $category->save();*/

        DB::table('categories')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
            'updated_at'=>Date('Y-m-d H:i:s'),
        ]);

        session()->flash('success','Category Created Succesfully');
        return redirect()->route('c.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::where('id',$id)->first();
        // dd($category);
        if($category)
            return view('Category.edit',compact('category'));
        else
            return "No Category Found to edit";
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request);
        $request->validate([
            'name'=>'required |unique:categories,name,'.$request->category_id,
            'description'=>'required|min:10',
        ]);
        $Existingcategory=Category::where('id',$request->category_id)->first();
        if($Existingcategory)
        {
            $Existingcategory->name=$request->name;
            $Existingcategory->description=$request->description;

            $Existingcategory->save();

            Session::put('message','Category Found');
            return redirect()->route('c.index');
        }
        else
        {
            Session::put('message','Category Not Found');
            return redirect()->route('c.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,Category $category)
    {
        // dd($request);
        Category::where('id',$request->category_id)->delete();
        session()->flash('danger','Category Deleted Succesfully');
        return redirect()->back();
    }
}
