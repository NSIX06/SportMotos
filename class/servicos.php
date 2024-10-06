<?php

class servicos
{
    private $pneus;
    private $freios;
    private $oleo_motor;
    private $corrente;
    private $bateria;
    private $filtros;
    private $valor;
    private $conn;

    public function __construct() {
        include_once('db/conn.php'); 
        $this->conn = $conn; 
    }

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

    public function getValor() {
        return $this->valor;
    }

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
    
    public function setValor($_valor) {
        $this->valor = $_valor;
    }

    public function inserirServicos() {
        $sql = "CALL piServicos(:pneus, :freios, :oleo_motor, :corrente, :bateria, :filtros, :valor)";

        $data = [
            'pneus' => $this->pneus,
            'freios' => $this->freios,
            'oleo_motor' => $this->oleo_motor,
            'corrente' => $this->corrente,
            'bateria' => $this->bateria,
            'filtros' => $this->filtros,
            'valor' => $this->valor
        ];

        $statement = $this->conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

    public function listarServicos() {
        try {
            $sql = "CALL psListarServicos()";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $data ?: []; 
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
        $sql = "CALL puServico(:id_servicos, :pneus, :freios, :oleo_motor, :corrente, :bateria, :filtros, :valor)";
        $data = [
            'id_servicos' => $_id,
            'pneus' => $this->pneus,
            'freios' => $this->freios,
            'oleo_motor' => $this->oleo_motor,
            'corrente' => $this->corrente,
            'bateria' => $this->bateria,
            'filtros' => $this->filtros,
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
                $this->pneus = $item["pneus"];
                $this->freios = $item["freios"];
                $this->oleo_motor = $item["oleo_motor"];
                $this->corrente = $item["corrente"];
                $this->bateria = $item["bateria"];
                $this->filtros = $item["filtros"];
                $this->valor = $item["valor"];
            }
            return true;
        }

        return false; 
    }
}
?>
