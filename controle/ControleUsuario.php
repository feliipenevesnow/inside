<?php

@include_once '../../controle/Conexao.php';

include_once '../controle/Conexao.php';

class ControleUsuario
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Usuario $usuario)
    {
        print_r($usuario);
        $sql = "INSERT INTO usuario (nome, endereco, cidade, cpf, foto, estado, ativo, nivel_acesso, contato, senha) VALUES (:nome, :endereco, :cidade, :cpf, :foto, :estado, :ativo, :nivel_acesso, :contato, :senha)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":endereco", $usuario->getEndereco());
        $stmt->bindValue(":cidade", $usuario->getCidade());
        $stmt->bindValue(":cpf", $usuario->getCpf());
        $stmt->bindValue(":foto", $usuario->getFoto());
        $stmt->bindValue(":estado", $usuario->getEstado());
        $stmt->bindValue(":ativo", $usuario->getAtivo());
        $stmt->bindValue(":nivel_acesso", $usuario->getNivelAcesso());
        $stmt->bindValue(":contato", $usuario->getContato());
        $stmt->bindValue(":senha", password_hash("123", PASSWORD_DEFAULT));
        $stmt->execute();
    }

    public function deletar(Usuario $usuario)
    {
        $sql = "SELECT u.* FROM usuario u 
        LEFT JOIN galeria g ON u.codigo = g.professor
        LEFT JOIN grau gr ON u.codigo = gr.aluno
        LEFT JOIN pagamento p ON u.codigo = p.aluno
        WHERE u.codigo = :codigo AND (g.professor IS NOT NULL OR gr.aluno IS NOT NULL OR p.aluno IS NOT NULL)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $usuario->getCodigo());
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            $sql = "UPDATE usuario SET ativo = false WHERE codigo = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":codigo", $usuario->getCodigo());
            $stmt->execute();
        } else {
            $usuario = $this->buscarPorId($usuario->getCodigo());
            if ($usuario['foto'] != 'user.png') {
                unlink('../images/usuario/' . $usuario['foto']);
            }


            $sql = "DELETE FROM usuario WHERE codigo = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":codigo", $usuario['codigo']);
            $stmt->execute();
        }
    }

    public function ultimoCadastroId()
{
    $sql = "SELECT MAX(codigo) AS ultimo_id FROM usuario";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $resultado['ultimo_id'];
}


    public function reativar(Usuario $usuario)
    {
        $sql = "UPDATE usuario SET ativo = 1 WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $usuario->getCodigo());
        $stmt->execute();
    }


    public function editar(Usuario $usuario, $senha = false)
    {
        if (!$senha) {
            $user = $this->buscarPorId($usuario->getCodigo());
            $password = $user['senha'];
            $sql = "UPDATE usuario SET nome = :nome, endereco = :endereco, cidade = :cidade, cpf = :cpf, foto = :foto, estado = :estado, ativo = :ativo, nivel_acesso = :nivel_acesso, contato = :contato, senha = :senha WHERE codigo = :codigo";
        } else {
            $sql = "UPDATE usuario SET nome = :nome, endereco = :endereco, cidade = :cidade, cpf = :cpf, foto = :foto, estado = :estado, ativo = :ativo, nivel_acesso = :nivel_acesso, senha = :senha, contato = :contato WHERE codigo = :codigo";
        }
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $usuario->getCodigo());
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":endereco", $usuario->getEndereco());
        $stmt->bindValue(":cidade", $usuario->getCidade());
        $stmt->bindValue(":cpf", $usuario->getCpf());
        $stmt->bindValue(":foto", $usuario->getFoto());
        $stmt->bindValue(":estado", $usuario->getEstado());
        $stmt->bindValue(":ativo", $usuario->getAtivo());
        $stmt->bindValue(":nivel_acesso", $usuario->getNivelAcesso());
        $stmt->bindValue(":contato", $usuario->getContato());
        if ($senha) {
            $stmt->bindValue(":senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        }else{
            $stmt->bindValue(":senha", $password);
        }
        $stmt->execute();
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM usuario ORDER BY ativo DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM usuario WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorNome(string $nome)
    {
        $sql = "SELECT * FROM usuario WHERE nome LIKE :nome AND nivel_acesso != 'Professor' ORDER BY ativo DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":nome", '%' . $nome . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function login(string $cpf, string $senha)
    {

        $sql = "SELECT * FROM usuario WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($senha, $usuario['senha'])) {
                if (!isset ($_SESSION)) {
                    session_start();
                }
                print_r($usuario);
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}



?>