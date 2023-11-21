<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $absensis = absensi::all();
            return response()->json([
                'success' => true,
                'message' => 'absensis retrieved.',
                'data' => $absensis
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'absensis could not be retrieved.',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {
            $absensi = new absensi();
            $absensi->fill($request->all());
            $absensi->save();
            return response()->json([
                'success' => true,
                'message' => 'absensi created.',
                'data' => $absensi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'absensi could not be created.',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $absensi = absensi::find($id);
            return response()->json([
                'success' => true,
                'message' => 'absensi retrieved.',
                'data' => $absensi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'absensi could not be retrieved.',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $absensi = absensi::find($id);
            $validator = Validator::make($request->all(), [
                'nim' => 'required',
                'nama_mahasiswa' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'absensi could not be updated.',
                    'data' => $validator->errors()
                ], 500);
            }
            $absensi->update($request->all());
            $absensi->save();
            return response()->json([
                'success' => true,
                'message' => 'absensi updated.',
                'data' => $absensi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'absensi could not be updated.',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $absensi = absensi::find($id);
            $absensi->delete();
            return response()->json([
                'success' => true,
                'message' => 'absensi deleted.',
                'data' => $absensi
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'absensi could not be deleted.',
                'data' => $e->getMessage()
            ], 500);
        }
    }

}
