# 🏫 Cadastro de Pessoas — Atividade Prática de POO em PHP

Atividade da disciplina de **Programação Orientada a Objetos** (Sistemas de Informação — IFTO): um cadastro simples de pessoas do campus usando classes, herança e polimorfismo em PHP.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)

## 🧩 Conceitos aplicados

- **Classes e objetos**: `Pessoa` com nome, CPF e tipo
- **Herança**: `Estudante`, `Professor`, `Servidor` e `Visitante` estendem `Pessoa`
- **Polimorfismo**: cada classe sobrescreve `mostrar_dados()` para exibir seus próprios campos, reaproveitando a classe mãe com `parent::`
- **Construtores encadeados** com `parent::__construct()`
- **Sessão** (`$_SESSION`) para manter a lista de cadastrados entre os envios do formulário

```
Pessoa
├── Estudante  (curso)
├── Professor  (função, salário)
├── Servidor   (função, salário)
└── Visitante
```

## ▶️ Como rodar

Com PHP instalado, na pasta do projeto:

```bash
php -S localhost:8000
```

E acesse `http://localhost:8000/index_ArthurMagalhaes.php`.
