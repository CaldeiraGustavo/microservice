<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\MedicoEspecialidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/medico",
     *     tags={"Medico"},
     *     summary="Retorna todos os médicos",
     *     description="Retorna todos os médicos",
     *     security={{ "api_token": {} }},
     *     @OA\Response(
     *          response=200,
     *          description="Cadastrado com sucesso.",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Medico"))),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function index()
    {
        return response()->json(Medico::all());
    }

    /**
     * @OA\Post(
     *     path="/medico",
     *     tags={"Medico"},
     *     summary="Cadastra novo médico",
     *     description="Cadastra novo médico",
     *     security={{ "api_token": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados do médico a serem atualizados",
     *         @OA\JsonContent(ref="#/components/schemas/Medico")
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="Cadastrado com sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Medico")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function store(Request $request)
    {
        $medico = Medico::create($request->toArray());
        return response()->json($medico, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/medico/{id}",
     *     tags={"Medico"},
     *     summary="Retorna médico pelo ID",
     *     description="Retorna médico pelo ID",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id do médico",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Medico")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function show(string $id)
    {
        return response()->json(Medico::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/medico/{id}",
     *     tags={"Medico"},
     *     summary="Edita dados do médico",
     *     description="Edita dados do médico",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da agenda",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados do médico a serem atualizados",
     *         @OA\JsonContent(ref="#/components/schemas/Medico")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Salvo com sucesso.",
     *          @OA\JsonContent(ref="#/components/schemas/Medico")),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function update(Request $request, string $id)
    {
        $medico = Medico::find($id)->update($request->toArray());
        return response()->json($medico, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *     path="/medico/{id}",
     *     tags={"Medico"},
     *     summary="Apaga registro do médico",
     *     description="Apaga registro do médico",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id do médico",
     *        in="path",
     *        name="id",
     *        example="1",
     *        required=true,
     *        @OA\Schema(
     *           type="integer",
     *           format="int64"
     *        ),
     *     ),
     *     @OA\Response(
     *          response=204,
     *          description="Apagado com sucesso."),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function destroy(string $id)
    {
        Medico::findOrFail($id)->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @OA\Post(
     *     path="/medico-especialidade",
     *     tags={"Medico"},
     *     summary="Cadastra nova especialidade para o médico",
     *     description="Cadastra nova especialidade para o médico",
     *     security={{ "api_token": {} }},
     *     @OA\Response(
     *          response=201,
     *          description="Cadastrado com sucesso.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de sucesso"},
     *                  summary="Salvo com sucesso"))),
     *     @OA\Response(
     *          response=401,
     *          description="Não autenticado",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "unauthenticated"},
     *                  summary="Não autenticado"))),
     *     @OA\Response(
     *          response=422,
     *          description="Entrada de dados inválida.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Dados inválidos."},
     *                  summary="Dados inválidos"))),
     *     @OA\Response(
     *          response=500,
     *          description="Erro interno do servidor.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"message": "Exemplo de mensagem de erro"},
     *                  summary="Mensagem de erro da exception"))),
     * ),
     */
    public function attachToDoctor(Request $request)
    {
        MedicoEspecialidade::create($request->toArray());
    }
}
