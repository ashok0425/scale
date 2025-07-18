<?php

namespace App\Http\Controllers;

use App\Exports\CrmsExport;
use App\Models\Crm;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ManageAccessController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('user:view')) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'You do not have sufficient permissions.',
            ];
            return redirect()->back()->with($notification);
        }

        $users = User::query()
            ->get();

        return view('access.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->user()->can('user:create')) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'You do not have sufficient permissions.',
            ];
            return redirect()->back()->with($notification);
        }

        $permissions = Permission::orderBy('name')->get();

        $permissionMap = [
            'others' => [],
        ];

        foreach ($permissions as $permission) {
            if (str_contains($permission->name, ':')) {
                $exploded = explode(':', $permission->name);
                $permissionMap[$exploded[0]] = array_merge(isset($permissionMap[$exploded[0]]) ? $permissionMap[$exploded[0]] : [], [$permission->name]);
            } else {
                array_push($permissionMap['other'], $permission->name);
            }
        }
        $roles = Role::orderBy('name')->get();

        return view('access.create', compact('permissions', 'roles', 'permissionMap'));
    }

    public function show($id)
{
    $user = Crm::findOrFail($id);
    return view('crm.show', compact('user'));
}

    public function store(Request $request)
    {
        if (!auth()->user()->can('user:create')) {
            abort(403);
        }
        // dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                // 'phone' => 'required|integer|unique:users,phone',
                'password' => 'required',
                'permissions' => 'nullable|array',
                // 'role' => 'required|integer',
            ],
        );



        $validator->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'status' => $request->status,
            // 'role' => $request->role ?? 4,
        ]);


        // $user->syncPermissions($request->permissions);

        $notification = [
            'alert-type' => 'success',
            'message' => 'created successfully',
        ];
        return redirect()->route('access.index')->with($notification);
    }

    public function edit($id)
    {
        if (!auth()->user()->can('user:edit')) {
            abort(403);
        }

        $user = User::where('id', $id)
            ->firstOrFail();
        $roles = Role::orderBy('name')->get();

        $permissions = Permission::orderBy('name')->get();

        $permissionMap = [
            'others' => [],
        ];

        foreach ($permissions as $permission) {
            if (str_contains($permission->name, ':')) {
                $exploded = explode(':', $permission->name);
                $permissionMap[$exploded[0]] = array_merge(isset($permissionMap[$exploded[0]]) ? $permissionMap[$exploded[0]] : [], [$permission->name]);
            } else {
                array_push($permissionMap['others'], $permission->name);
            }
        }

        // appending others to the end of the $permissionMap
        $otherPermissions = Arr::pull($permissionMap, 'others');
        $permissionMap['others'] = $otherPermissions;

        return view('access.edit', compact('user', 'permissions', 'roles', 'permissionMap'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('user:edit')) {
            abort(403);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                // 'phone' => 'required|integer',
                'permissions' => 'nullable|array',
                // 'role' => 'required|integer',
            ],
        );


        $validator->validate();

        $user = User::where('id', $id)
            ->firstOrFail();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
            // 'role' => $request->role ?? 4,
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // $user->syncPermissions($request->permissions);

        $notification = [
            'alert-type' => 'success',
            'message' => 'updated successfully',
        ];
        return redirect()->route('access.index')->with($notification);
    }

    public function destroy($id)
    {
        if (!auth()->user()->can('user:delete')) {
            abort(403);
        }

        $user = User::where('id', $id)
            ->firstOrFail();
        $user->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'User Deleted',
        ];
        return redirect()->back()->with($notification);
        return redirect()->route('access.index');
    }

    public function password($user_id)
    {
        return view('user.password', compact('user_id'));
    }

    public function updatePassword(Request $request, $user_id)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::find($user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Password updated',
        ];

        return redirect()->back()->with($notification);
    }

    public function users()
    {
        if (!auth()->user()->can('can:do_anything')) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'You do not have sufficient permissions.',
            ];
            return redirect()->back()->with($notification);
        }

        $users = User::latest()->paginate(20);
        return view('user.index', compact('users'));
    }

    public function crmDelete($id){
        Crm::where('id',$id)->delete();
          $notification = [
            'alert-type' => 'success',
            'message' => 'User Deleted',
        ];

        return redirect()->back()->with($notification);
    }

    public function crm(Request $request)
    {
        $search=$request->keyword;
        $users = Crm::where('type', $request->type)
    ->when($search, function ($query, $search) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%')
              ->orWhere('phone', 'like', '%' . $search . '%');
        });
    })
    ->latest();

    if($request->export){
         return Excel::download(new CrmsExport(null,null,null,1), 'filtered-users.xlsx');
    }
    $users=$users->paginate(20);
        if($request->type==1)
        return view("crm.waitlist", compact('users'));

         if($request->type==2)
        return view("crm.access", compact('users'));

         if($request->type==3)
        return view("crm.download", compact('users'));
    }

      public function subscriber(Request $request)
    {
        $users=Subscriber::latest()->get();
        return view("subscriber.index", compact('users'));

    }

    public function crmEdit( $id){
       $crm=Crm::find($id);
        return view('crm.edit',compact('crm'));
    }
}
