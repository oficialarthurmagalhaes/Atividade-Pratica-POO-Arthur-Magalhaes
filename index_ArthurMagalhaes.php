<?php
session_start();

if (!isset($_SESSION['pessoaIFTO'])) {
    $_SESSION['pessoaIFTO'] = [];
}
$pessoaIFTO = &$_SESSION['pessoaIFTO'];

class Pessoa {
    public $nome;
    public $cpf;
    public $tipo;

    public function __construct($nome, $cpf, $tipo) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->tipo = $tipo;
    }

    public function mostrar_dados() {
        echo "Tipo: " . $this->tipo . "<br>";
        echo "Nome: " . $this->nome . "<br>";
        echo "CPF: " . $this->cpf . "<br>";
    }
}

class Estudante extends Pessoa {
    public $curso;

    public function __construct($nome, $cpf, $curso) {
        parent::__construct($nome, $cpf, "Estudante");
        $this->curso = $curso;
    }

    public function mostrar_dados() {
        parent::mostrar_dados();
        echo "Curso: " . $this->curso . "<br><hr>";
    }
}

class Professor extends Pessoa {
    public $funcao;
    public $salario;

    public function __construct($nome, $cpf, $funcao, $salario) {
        parent::__construct($nome, $cpf, "Professor");
        $this->funcao = $funcao;
        $this->salario = $salario;
    }

    public function mostrar_dados() {
        parent::mostrar_dados();
        echo "Função: " . $this->funcao . "<br>";
        echo "Salário: R$ " . $this->salario . "<br><hr>";
    }
}

class Servidor extends Pessoa {
    public $funcao;
    public $salario;

    public function __construct($nome, $cpf, $funcao, $salario) {
        parent::__construct($nome, $cpf, "Servidor");
        $this->funcao = $funcao;
        $this->salario = $salario;
    }

    public function mostrar_dados() {
        parent::mostrar_dados();
        echo "Função: " . $this->funcao . "<br>";
        echo "Salário: R$ " . $this->salario . "<br><hr>";
    }
}

class Visitante extends Pessoa {
    public function __construct($nome, $cpf) {
        parent::__construct($nome, $cpf, "Visitante");
    }

    public function mostrar_dados() {
        parent::mostrar_dados();
        echo "Visitante cadastrado apenas para controle de entrada.<br><hr>";
    }
}

// CADASTRO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    if ($tipo == "estudante") {
        $curso = $_POST['curso'];
        $nova = new Estudante($nome, $cpf, $curso);
    } elseif ($tipo == "professor") {
        $funcao = $_POST['funcao'];
        $salario = $_POST['salario'];
        $nova = new Professor($nome, $cpf, $funcao, $salario);
    } elseif ($tipo == "servidor") {
        $funcao = $_POST['funcao'];
        $salario = $_POST['salario'];
        $nova = new Servidor($nome, $cpf, $funcao, $salario);
    } else {
        $nova = new Visitante($nome, $cpf);
    }

    $pessoaIFTO[] = $nova;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro IFTO</title>
</head>
<body>
    <h3>Cadastro de Pessoas - IFTO</h3>

    <form method="post">
        Tipo:
        <select name="tipo">
            <option value="estudante">Estudante</option>
            <option value="professor">Professor</option>
            <option value="servidor">Servidor</option>
            <option value="visitante">Visitante</option>
        </select><br><br>

        Nome: <input type="text" name="nome" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>

        Curso (estudante): <input type="text" name="curso"><br><br>
        Função (professor/servidor): <input type="text" name="funcao"><br><br>
        Salário (professor/servidor): <input type="number" name="salario" step="0.01"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <h3>Pessoas Cadastradas</h3>
    <?php
    if (count($pessoaIFTO) == 0) {
        echo "Nenhuma pessoa cadastrada.";
    } else {
        foreach ($pessoaIFTO as $p) {
            $p->mostrar_dados();
        }
    }
    ?>
</body>
</html>
