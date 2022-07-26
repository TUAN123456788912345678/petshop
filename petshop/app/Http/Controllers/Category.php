<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use App\Models\Category; 
class CategoryController extends Controller 
{  
 
public function index() 
{ 
  $categories=Category::all(); 
// return view('admin.listCategory', ['categories' => $categories]); 
 return view('admin.listCategory', compact("categories")); 
} 
 
 public function getCreate() 
{ 
 return view('admin.createCategory'); 
} 
//Hàm store để thêm dữ liệu 
public function postCreate(Request $request) 
{ 
 
$category = new Category; 
 $category->category_name = $request->category_name; 
$category->category_description = $request->category_description; 
 $category->save(); 

return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');; 
 
 } 
 public function getEditCate($category_id) 
{ 
$data['cate'] = Category::find($category_id); 
return view('admin.editCategory',$data); 
 } 
 public function postEditCate(Request $request,$category_id) 
{ 
$category = Category::find($category_id); 
$category->category_name = $request->category_name; 
$category->category_description = $request->category_description; 
 $category->save(); 
return redirect()->route('admin.category.index'); 
 } 
public function delete($id) 
{ 
 $category = Category::find($id); 
$category->delete(); 
return back(); 
 } 
 
} 