<?php

namespace App\Http\Controllers;

use App\Models\AgendaMedica;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AgendaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/agenda",
     *     tags={"Agenda"},
     *     summary="Retorna todas as agendas",
     *     description="Retorna todas as agendas",
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
        return response()->json(AgendaMedica::all());
    }

    /**
     * @OA\Post(
     *     path="/agenda",
     *     tags={"Agenda"},
     *     summary="Cadastra nova agenda",
     *     description="Cadastra nova agenda",
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
        $agendaMedica = AgendaMedica::create();
        return response()->json($agendaMedica, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/agenda/{id}",
     *     tags={"Agenda"},
     *     summary="Retorna agenda pelo id",
     *     description="Retorna agenda pelo id",
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
        return response()->json(AgendaMedica::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/agenda",
     *     tags={"Agenda"},
     *     summary="Edita agenda",
     *     description="Edita agenda",
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
        $agendaMedica = AgendaMedica::find($id)->update($request->toArray());
        return response()->json($agendaMedica, Response::HTTP_CREATED);
    }

    /**
     * @OA\Delete(
     *     path="/agenda/{id}",
     *     tags={"Agenda"},
     *     summary="Apaga registro da agenda",
     *     description="Apaga registro da agenda",
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
        AgendaMedica::findOrFail($id)->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
