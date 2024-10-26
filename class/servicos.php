<?php

class servicos
{
<<<<<<< HEAD
    private $tipo_servico;
=======
    private $pneus;
    private $freios;
    private $oleo_motor;
    private $corrente;
    private $bateria;
    private $filtros;
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
    private $valor;
    private $conn;

    public function __construct() {
        include_once('db/conn.php'); 
        $this->conn = $conn; 
    }

<<<<<<< HEAD
    public function create( $_tipo_servico, $_valor) {
        $this->tipo_servico = $_tipo_servico;
        $this->valor = $_valor;
    }
    
        public function getTipo_servico() {
            return $this->tipo_servico;
        }
=======
    public function create($_pneus, $_freios, $_oleo_motor, $_corrente, $_bateria, $_filtros, $_valor) {
        $this->pneus = $_pneus;
        $this->freios = $_freios;
        $this->oleo_motor = $_oleo_motor;
        $this->corrente = $_corrente;
        $this->bateria = $_bateria;
        $this->filtros = $_filtros;
        $this->valor = $_valor;
    }

    public function getPneus() {
        return $this->pneus;
    }

    public function getFreios() {
        return $this->freios;
    }

    public function getOleo_motor() {
        return $this->oleo_motor;
    }

    public function getCorrente() {
        return $this->corrente;
    }

    public function getBateria() {
        return $this->bateria;
    }

    public function getFiltros() {
        return $this->filtros;
    }
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671

    public function getValor() {
        return $this->valor;
    }

<<<<<<< HEAD
    public function setTipo_servico($_tipo_servico) {
        $this->pneus = $_tipo_servico;
    }

=======
    public function setPneus($_pneus) {
        $this->pneus = $_pneus;
    }
    
    public function setFreios($_freios) {
        $this->freios = $_freios;
    }
    
    public function setOleo_motor($_oleo_motor) {
        $this->oleo_motor = $_oleo_motor;
    }
    
    public function setCorrente($_corrente) {
        $this->corrente = $_corrente;
    }
    
    public function setBateria($_bateria) {
        $this->bateria = $_bateria;
    }
    
    public function setFiltros($_filtros) {
        $this->filtros = $_filtros;
    }
    
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
    public function setValor($_valor) {
        $this->valor = $_valor;
    }

<<<<<<< HEAD
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
=======
    public function inserirServicos() {
        $sql = "CALL piServicos(:pneus, :freios, :oleo_motor, :corrente, :bateria, :filtros, :valor)";

        $data = [
            'pneus' => $this->pneus,
            'freios' => $this->freios,
            'oleo_motor' => $this->oleo_motor,
            'corrente' => $this->corrente,
            'bateria' => $this->bateria,
            'filtros' => $this->filtros,
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

<<<<<<< HEAD
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
=======
    public function listarServicos() {
        try {
            $sql = "CALL psListarServicos()";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data ?: []; 
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
        } catch (PDOException $e) {
            echo "Erro ao listar serviços: " . $e->getMessage();
            return [];
        }
    }
<<<<<<< HEAD
    
    
=======
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671

    public function excluirServico($_id) {
        $sql = "CALL pdServico(:id)";
        $data = ['id' => $_id];
        $statement = $this->conn->prepare($sql);
        $statement->execute($data);
        return true;
    }
    
    public function atualizarServicos($_id) {
<<<<<<< HEAD
        $sql = "CALL puServico(:id_servicos, :tipo_servico, :valor)";
        $data = [
            'id_servicos' => $_id,
            'tipo_servico' => $this->tipo_servico,
=======
        $sql = "CALL puServico(:id_servicos, :pneus, :freios, :oleo_motor, :corrente, :bateria, :filtros, :valor)";
        $data = [
            'id_servicos' => $_id,
            'pneus' => $this->pneus,
            'freios' => $this->freios,
            'oleo_motor' => $this->oleo_motor,
            'corrente' => $this->corrente,
            'bateria' => $this->bateria,
            'filtros' => $this->filtros,
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
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
<<<<<<< HEAD
                $this->pneus = $item["tipo_servico"];
=======
                $this->pneus = $item["pneus"];
                $this->freios = $item["freios"];
                $this->oleo_motor = $item["oleo_motor"];
                $this->corrente = $item["corrente"];
                $this->bateria = $item["bateria"];
                $this->filtros = $item["filtros"];
>>>>>>> 302088d7b262acf2844b9b76868b862b15b0f671
                $this->valor = $item["valor"];
            }
            return true;
        }

        return false; 
    }
}
?>
