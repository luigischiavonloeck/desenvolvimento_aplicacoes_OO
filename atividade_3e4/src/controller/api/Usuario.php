<?php

namespace tsi\atividade_3e4\controller\api;

use tsi\atividade_3e4\model\Usuario as ModelUsuario;
use Exception;

class Usuario extends Controller
{

	private ModelUsuario $model;

	public function __construct()
	{
		try {
			$this->model = new ModelUsuario();
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
		$usuario = $this->model->read($id);
		if ($usuario) {
			$response = ['usuario' => $usuario];
		} else {
			$response = ['Erro' => "Usuario não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($response);
	}

	public function store()
	{
		try {
			$this->validateUsuarioRequest();

			$this->model = new Usuario(
				$_POST['nome'],
        $_POST['email'],
        $_POST['cpf'],
        $_POST['cidade'],
        $_POST['cep']
			);

			if ($this->model->create()) {
				echo json_encode([
					"success" => "Usuario criado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			} else {
				$msg = 'Erro ao cadastrar usuario!';
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
				throw new Exception("Informe o ID do Usuario!!");

			$this->validateUsuarioRequest();

			$this->model = new Usuario(
				$_POST['nome'],
				$_POST['email'],
				$_POST['cpf'],
				$_POST['cidade'],
				$_POST['cep']
			);
			$this->model->id = $_POST["id"];
      
			if ($this->model->update())
				echo json_encode([
					"success" => "Usuario atualizado com sucesso!",
					"data" => $this->model->getColumns()
				]);
			else throw new Exception("Erro ao atualizar usuario!");
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
				$response = ["message:" => "Usuario id:$id removido com sucesso!"];
			} else {
				$this->setHeader(500, 'Internal Error.');
				throw new Exception("Erro ao remover Usuario!");
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

	private function validateUsuarioRequest()
	{
		$fields = [
			'nome',
			'email',
			'cpf',
			'cidade',
			'cep'
		];
		if (!$this->validatePostRequest($fields))
			throw new Exception('Erro: campos imcompletos!');
	}
}
