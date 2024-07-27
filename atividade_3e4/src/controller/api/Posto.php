<?php

namespace tsi\atividade_3e4\controller\api;

use tsi\atividade_3e4\model\Posto as ModelPosto;
use Exception;

class Posto extends Controller
{

	private ModelPosto $model;

	public function __construct()
	{
		try {
			$this->model = new ModelPosto();
			$this->setHeader(200);
		} catch (Exception $error) {
			$this->setHeader(500, "Erro ao conectar ao banco!");
			json_encode(["error" => $error->getMessage()]);
		}
	}

	public function index()
	{
		echo json_encode($this->model->read());
	}

	public function show($id)
	{
		$posto = $this->model->read($id);
		if ($posto) {
			$response = ['posto' => $posto];
		} else {
			$response = ['Erro' => "Posto não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($response);
	}

	public function store()
	{
		try {
			$this->validatePostoRequest();

			$this->model = new Posto(
				$_POST['nome'],
        $_POST['cnpj'],
        $_POST['endereco'],
        $_POST['cep'],
        $_POST['cidade'],
        $_POST['cordX'],
        $_POST['cordY']
			);

			if ($this->model->create()) {
				echo json_encode([
					"success" => "Posto criado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar posto!';
				$this->setHeader(500, $msg);
				throw new Exception($msg);
			}
		} catch (Exception $error) {
			echo json_encode([
				"error" => $error->getMessage(),
				"trace" => $error->getTrace()
			]);
		}
	}

	public function update()
	{
		try {
			if (!$this->validatePostRequest(['id']))
				throw new Exception("Informe o ID do Posto!!");

			$this->validatePostoRequest();

			$this->model = new Posto(
				$_POST['nome'],
        $_POST['cnpj'],
        $_POST['endereco'],
        $_POST['cep'],
        $_POST['cidade'],
        $_POST['cordX'],
        $_POST['cordY']
			);
			$this->model->id = $_POST["id"];
      
			if ($this->model->update())
				echo json_encode([
					"success" => "Posto atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new Exception("Erro ao atualizar posto!");
		} catch (Exception $error) {
			$this->setHeader(500, 'Erro interno do servidor!!!!');
			echo json_encode([
				"error" => $error->getMessage()
			]);
		}
	}

	public function remove()
	{
		try {
			if (!isset($_POST["id"])) {
				$this->setHeader(400, 'Bad Request.');
				throw new Exception('Erro: id obrigatorio!');
			}
			$id = $_POST["id"];
			if ($this->model->delete($id)) {
				$response = ["message:" => "Posto id:$id removido com sucesso!"];
			} else {
				$this->setHeader(500, 'Internal Error.');
				throw new Exception("Erro ao remover Posto!");
			}
			echo json_encode($response);
		} catch (Exception $error) {
			echo json_encode([
				"error" => $error->getMessage()
			]);
		}
	}

	public function filter(): void
	{

		if (!isset($_POST))
			echo json_encode(["error" => "enviar os filtros"]);
		$reulsts = $this->model->filter($_POST);
		echo json_encode($reulsts);
	}

	private function validatePostoRequest()
	{
		$fields = [
			'nome',
      'cnpj',
      'endereco',
      'cep',
      'cidade',
      'cordX',
      'cordY'
		];
		if (!$this->validatePostRequest($fields))
			throw new Exception('Erro: campos imcompletos!');
	}
}
