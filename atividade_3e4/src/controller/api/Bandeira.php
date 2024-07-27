<?php

namespace Tsi\Atividade3e4\controller\api;

use Tsi\Atividade3e4\model\Bandeira as ModelBandeira;
use Exception;

class Bandeira extends Controller
{

	private ModelBandeira $model;

	public function __construct()
	{
		try {
			$this->model = new ModelBandeira();
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
		$bandeira = $this->model->read($id);
		if ($bandeira) {
			$response = ['bandeira' => $bandeira];
		} else {
			$response = ['Erro' => "Bandeira não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($response);
	}

	public function store()
	{
		try {
			$this->validateBandeiraRequest();

			$this->model = new ModelBandeira(
				$_POST['nome'],
        $_POST['imagem']
			);

			if ($this->model->create()) {
				echo json_encode([
					"success" => "Bandeira criado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar bandeira!';
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
				throw new Exception("Informe o ID do Bandeira!!");

			$this->validateBandeiraRequest();

			$this->model = new ModelBandeira(
				$_POST['nome'],
        $_POST['imagem']
			);
			$this->model->id = $_POST["id"];
      
			if ($this->model->update())
				echo json_encode([
					"success" => "Bandeira atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new Exception("Erro ao atualizar bandeira!");
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
				$response = ["message:" => "Bandeira id:$id removido com sucesso!"];
			} else {
				$this->setHeader(500, 'Internal Error.');
				throw new Exception("Erro ao remover Bandeira!");
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

	private function validateBandeiraRequest()
	{
		$fields = [
			'nome',
      'imagem'
		];
		if (!$this->validatePostRequest($fields))
			throw new Exception('Erro: campos imcompletos!');
	}
}
