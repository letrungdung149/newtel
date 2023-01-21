<?php
 
namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;
class UserController
{
    public function index(Request $request)
    {
        $users = User::where([
            ['name', '!=', Null],
            [
                function ($query) use ($request) {
                    if (($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }
            ]
        ])
            ->orderBy("id", "desc")
            ->paginate(10);
        return view('admin.users.index',compact('users'))->with('i',(request()->input('page',1)-1) * 5);
    }
    
    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/users');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request,$id){
        
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(123456),
        ]);
        return redirect('admin/users');
    }

    public function delete($id){
        $userDelete = User::findOrFail($id);
        $userDelete->delete();
        return redirect('admin/users');
    }
}