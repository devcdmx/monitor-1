<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HealthcareProfessional;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth; // Para obtener el ID del usuario autenticado

class HealthcareProfessionalController extends Controller
{
    /**
     * Mostrar una lista de todos los profesionales de la salud.
     */
    public function index()
    {
        return response()->json(HealthcareProfessional::all(), 200);
    }

    /**
     * Almacenar un nuevo profesional de la salud.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'matricula' => 'required|integer',
            'sexo' => 'required|string',
            'especialidad' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            // Agrega más validaciones según sea necesario
        ]);

        // Asignar el user_id al ID del usuario autenticado
        $validatedData['user_id'] = Auth::id();

        $healthcareProfessional = HealthcareProfessional::create($validatedData);

        return response()->json($healthcareProfessional, 201);
    }

    /**
     * Mostrar un profesional de la salud específico.
     */
    public function show($id)
    {
        $healthcareProfessional = HealthcareProfessional::find($id);
        
        if (!$healthcareProfessional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        return response()->json($healthcareProfessional, 200);
    }

    /**
     * Actualizar un profesional de la salud existente.
     */
    public function update(Request $request, $id)
    {
        $healthcareProfessional = HealthcareProfessional::find($id);

        if (!$healthcareProfessional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre_completo' => 'sometimes|required|string|max:255',
            'matricula' => 'sometimes|required|integer',
            'sexo' => 'sometimes|required|string',
            'especialidad' => 'sometimes|required|string|max:255',
            'fecha_ingreso' => 'sometimes|required|date',
            // Agrega más validaciones según sea necesario
        ]);

        $healthcareProfessional->update($validatedData);

        return response()->json($healthcareProfessional, 200);
    }

    /**
     * Eliminar un profesional de la salud específico.
     */
    public function destroy($id)
    {
        $healthcareProfessional = HealthcareProfessional::find($id);

        if (!$healthcareProfessional) {
            return response()->json(['message' => 'Profesional no encontrado'], 404);
        }

        $healthcareProfessional->delete();

        return response()->json(['message' => 'Profesional eliminado'], 204);
    }
}