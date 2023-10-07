<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EspecialidadeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/especialidade",
     *     tags={"Especialidade"},
     *     summary="Retorna todas as especialidades",
     *     description="Retorna todas as especialidades",
     *     security={{ "api_token": {} }},
     *     @OA\Response(
     *          response=200,
     *          description="Cadastrado com sucesso.",
     *          @OA\JsonContent(
     *              @OA\Examples(
     *                  example="result",
     *                  value={"id": "1", "data": "13/10/2023"},
     *                  summary="Dados de retorno"))),
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
        return response()->json(Especialidade::all());
    }

    /**
     * @OA\Post(
     *     path="/especialidade",
     *     tags={"Especialidade"},
     *     summary="Cadastra nova especialidade",
     *     description="Cadastra nova especialidade",
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
    public function store(Request $request)
    {
        $especialidade = Especialidade::create($request->toArray());
        return response()->json($especialidade, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/especialidade/{id}",
     *     tags={"Especialidade"},
     *     summary="Retorna especialidade pelo ID",
     *     description="Retorna especialidade pelo ID",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da especialidade",
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
    public function show(string $id)
    {
        return response()->json(Especialidade::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/especialidade",
     *     tags={"Especialidade"},
     *     summary="Edita dados da especialidade",
     *     description="Edita dados da especialidade",
     *     security={{ "api_token": {} }},
     *     @OA\Response(
     *          response=200,
     *          description="Salvo com sucesso.",
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
    public function update(Request $request, string $id)
    {
        $especialidade = Especialidade::find($id)->update($request->toArray());
        return response()->json($especialidade, Response::HTTP_OK);
    }

    /**
     * @OA\Delete(
     *     path="/especialidade/{id}",
     *     tags={"Especialidade"},
     *     summary="Apaga registro da especialidade",
     *     description="Apaga registro da especialidade",
     *     security={{ "api_token": {} }},
     *     @OA\Parameter(
     *        description="Id da especialidade",
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
        Especialidade::findOrFail($id)->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
