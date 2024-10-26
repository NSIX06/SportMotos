<?php

class servicos
{
    private $tipo_servico;
    private $valor;
    private $conn;

    public function __construct() {
        include_once('db/conn.php'); 
        $this->conn = $conn; 
    }

    public function create( $_tipo_servico, $_valor) {
        $this->tipo_servico = $_tipo_servico;
        $this->valor = $_valor;
    }
    
        public function getTipo_servico() {
            return $this->tipo_servico;
        }

    public function getValor() {
        return $this->valor;
    }

    public function setTipo_servico($_tipo_servico) {
        $this->pneus = $_tipo_servico;
    }

    public function setValor($_valor) {
        $this->valor = $_valor;
    }

    private function conectarBanco() {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=sua_base_de_dados', 'seu_usuario', 'sua_senha');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function inserirServicos() {
        $sql = "CALL piServicos(:tipo_servico, :valor)";

        $data = [
            
            'tipo_servico' => $this->tipo_servico,
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

    public function listarServicos($filtro = '') {
        try {
            // Construa a consulta SQL para selecionar os serviços com filtro, se fornecido
            $sql = "SELECT id_servicos, tipo_servico, valor FROM servicos";
            
            // Adiciona a cláusula WHERE caso o filtro esteja presente
            if (!empty($filtro)) {
                $sql .= " WHERE tipo_servico LIKE :filtro";
            }
            
            $stmt = $this->conn->prepare($sql);
    
            // Bind do valor do filtro, se presente
            if (!empty($filtro)) {
                $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_STR);
            }
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar serviços: " . $e->getMessage();
            return [];
        }
    }
    
    

    public function excluirServico($_id) {
        $sql = "CALL pdServico(:id)";
        $data = ['id' => $_id];
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    
    public function atualizarServicos($_id) {
        $sql = "CALL puServico(:id_servicos, :tipo_servico, :valor)";
        $data = [
            'id_servicos' => $_id,
            'tipo_servico' => $this->tipo_servico,
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }

    public function buscarServicos($_id) {
        $sql = "CALL psServicos(:id)";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $_id);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($data) {
            foreach ($data as $item) {
                $this->pneus = $item["tipo_servico"];
                $this->valor = $item["valor"];
            }
            return true;
        }

        return false; 
    }
}
?>
