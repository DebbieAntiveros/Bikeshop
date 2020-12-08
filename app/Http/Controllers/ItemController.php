<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Items;
use App\Inventory;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    public function index(){
      $items = Inventory::all();
        return view('items.index',[
            'items' => $items,]);
    }
    public function search(){
        $search = $_GET['search'];
        $items = Items::where('product_name','like','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->get();
        return view('items.search',[
            'items' => $items,]);
    }
    public function show($id){
        
        $item = Items::findOrFail($id);
        return view('items.show',[
            'item'=> $item]);
    }
    public function edit($id){
        
        $item = Items::findOrFail($id);
        return view('items.edit',[
            'item'=> $item]);

    }
    public function update($id){
        
        $items = Items::findOrFail($id);
        
        $items-> product_code=request('product_code');
        $items-> product_name=request('product_name');
        $items-> category=request('category');
        $items-> quantity=request('quantity');
        $items-> selling_price=request('selling_price');
        
        
        Alert::success('Success', 'The item has been updated successfully.');
        $items -> save();
        return redirect('/items')->with('success','The item has been updated.');

    }
    public function create(){
        return view('items.create');
    }
    public function store(){
       
        $items = new Items();
        
        $items-> product_code=request('product_code');
        $items-> product_name=request('product_name');
        $items-> category=request('category');
        $items-> quantity=request('quantity');
        $items-> selling_price=request('selling_price');
        
        Alert::success('Success', 'The item has been saved successfully.');
        $items -> save();
        return redirect('/items');
    }
    public function destroy($id) {
        Alert::toast('The item has been deleted!','success');
        $item = Items::findOrFail($id);
        $item->delete();
        return redirect('items');
    }
    
}
