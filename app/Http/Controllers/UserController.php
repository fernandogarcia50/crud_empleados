<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.principal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert(
            ['name' => $request->nombre, 'last_name' => $request->last_name, 'email' => $request->email, 'phone_number' => $request->phone_number]
        );
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function obtener(Request $request)
    {
        $user = User::all();
        $users = DB::table('users')->select(['id', 'name', 'last_name', 'email', 'phone_number']);
        //  dd(json_encode($users));
        if ($request->ajax()) {
            return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    $acciones = '<a href="javascript:void(0)" class= "btn btn-warning" onclick="editarUser(' . $user->id . ')" type="button" style="color: black; font-weight: bold;">Editar</a>';
                    $acciones .= '<button type="button" name="delete" id="' . $user->id . '" class="btn btn-danger mx-2 delete" style="color: white; font-weight: bold;">Eliminar</button>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('usuario.principal');
    }
    public function eliminar($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return back();
    }
    public function actualizar(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update(['name' => $request->nombre, 'last_name' => $request->last_name, 'email' => $request->email, 'phone_number' => $request->phone_number]);
        return back();
    }
}
