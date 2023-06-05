<?php

namespace App\Http\Controllers\Managers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller

{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if($request->search){
        //     dd($request->search);
        // }
        $users = User::whereHas('roles', function($q){$q->whereIn('roles.name', ['admin']);})
        ->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });

        // })->latest()->paginate(1);
    })->paginate(10);


         return view('dashboard.users.index', compact('users'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*******    dd( $request->all());   ****************//

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'password_confirmation', 'permissions', 'image']);
        $request_data['password'] = bcrypt($request->password);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        $user = User::create($request_data);
        $user->addRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
       
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'permissions' => 'required|min:1'
        ]);

        $request_data = $request->except(['permissions']);
        // $request_data = $request->except(['permissions', 'image']);

        // if ($request->image) {

        //     if ($user->image != 'default.png') {

        //         Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

        //     }//end of inner if

        //     Image::make($request->image)
        //         ->resize(300, null, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })
        //         ->save(public_path('uploads/user_images/' . $request->image->hashName()));

        //     $request_data['image'] = $request->image->hashName();

        // }//end of external if

        $user->update($request_data);

        $user->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('users.index');

    }
}
