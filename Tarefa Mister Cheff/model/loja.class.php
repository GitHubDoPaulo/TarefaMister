<?php
include_once 'conexao.php';

class loja {
    private $id;
    private $nome;
    private $cnpj;
    private $email;
    private $contato;
    private $cep;
    private $logo;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;

    public function getRua() {
        return $this->rua;
    }
    public function setRua($rua) {
        $this->rua = $rua;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function getNumero() {
        return $this->numero;
    }
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function getComplemento() {
        return $this->complemento;
    }
    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getContato() {
        return $this->contato;
    }
    public function setContato($contato) {
        $this->contato = $contato;
    }
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    public function getCnpj() {
        return $this->cnpj;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }
    public function getCep() {
        return $this->cep;
    }

    public function getLogo() {
        return $this->logo;
    }
    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function save() {
        $pdo = conexao();
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare('INSERT INTO lojas (nome, cnpj, email, contato, logo) VALUES(:nome, :cnpj, :email, :contato, :logo)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':cnpj' => $this->cnpj,
                ':email' => $this->email,
                ':contato' => $this->contato,
                ':logo' => $this->logo
            ]);

            $lojaId = $pdo->lastInsertId();

            $stmtCateg = $pdo->prepare('INSERT INTO endereco (idLoja, cep, rua, numero, complemento, bairro, cidade, estado) VALUES (:loja_id, :cep, :rua, :numero, :complemento, :bairro, :cidade, :estado)');
            $stmtCateg->execute([
                ':loja_id' => $lojaId,
                ':cep' => $this->cep,
                ':rua' => $this->rua,
                ':numero' => $this->numero,
                ':complemento' => $this->complemento,
                ':bairro' => $this->bairro,
                ':cidade' => $this->cidade,
                ':estado' => $this->estado
            ]);

            $pdo->commit();
            return true;

        } catch (Exception $e) {
            $pdo->rollBack();
            return false;
        }
    }

    public static function deletar($id) {
        $pdo = conexao();
        $stmt = $pdo->prepare('DELETE FROM lojas WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);
        $stmt = $pdo->prepare('DELETE FROM endereco WHERE idLoja = :id');
        $stmt->execute([
            ':id' => $id
        ]);
    }

    public static function getAll() {
        $pdo = conexao();
        $lista = [];

        $query = 'SELECT lo.*, en.*
                  FROM lojas lo
                  LEFT JOIN endereco en ON lo.id = en.idLoja
                  ORDER BY lo.id DESC';

        $resultados = $pdo->query($query)->fetchAll(PDO::FETCH_GROUP);

        foreach ($resultados as $id => $rows) {
            $loja = new loja();
            $loja->setId($id);

            foreach ($rows as $linha) {
                $loja->setNome($linha['nome']);
                $loja->setCnpj($linha['cnpj']);
                $loja->setEmail($linha['email']);
                $loja->setContato($linha['contato']);
                $loja->setLogo($linha['logo']);
                $loja->setId($linha['idLoja']);
                $loja->setCep($linha['cep']);
                $loja->setRua($linha['rua']);
                $loja->setNumero($linha['numero']);
                $loja->setComplemento($linha['complemento']);
                $loja->setBairro($linha['bairro']);
                $loja->setCidade($linha['cidade']);
                $loja->setEstado($linha['estado']);
            }

            $lista[] = $loja;
        }

        return $lista;
    }
}
