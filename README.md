# 🎟️ Passaporte.io

Sistema web para gerenciamento e participação em eventos desenvolvido como atividade da disciplina **Programação Web III**.

---

## 📌 Sobre o Projeto

O Passaporte.io é uma plataforma que permite que usuários encontrem eventos, realizem inscrições e acompanhem suas participações. O sistema também possui uma área administrativa para organizadores criarem e gerenciarem eventos.

O projeto foi desenvolvido utilizando Laravel, MySQL e tecnologias modernas para construção de interfaces web.

---

## 👨‍💻 Integrantes

- Mariana dos Santos Moreira

---

## 🚀 Funcionalidades

### Participante

- ✅ Cadastro de usuário
- ✅ Login e Logout
- ✅ Visualização de eventos
- ✅ Visualização dos detalhes de um evento
- ✅ Inscrição em eventos
- ✅ Cancelamento de inscrição
- ✅ Consulta de inscrições realizadas

### Organizador

- ✅ Criação de eventos
- ✅ Edição de eventos
- ✅ Exclusão de eventos
- ✅ Gerenciamento dos eventos cadastrados

---

## 🛠️ Tecnologias Utilizadas

### Backend

- PHP 8+
- Laravel 12
- MySQL

### Frontend

- Blade Templates
- Tailwind CSS
- DaisyUI
- JavaScript

### Ferramentas

- Git
- GitHub
- Composer
- NPM
- Vite

---

## 🗄️ Banco de Dados

O sistema utiliza MySQL para armazenamento das informações.

### Principais entidades

- Usuários
- Categorias
- Eventos
- Inscrições

### Relacionamentos

- Um usuário pode participar de vários eventos.
- Um evento pode possuir vários participantes.
- Um organizador pode criar vários eventos.
- Cada evento pertence a uma categoria.

---

## 📷 Telas do Sistema

### Tela Inicial

![Tela Inicial](telainicial.png)

### Login

![Login](login.png)

### Eventos

![Eventos](eventos.png)

---


## 🔗 Principais Rotas

| Funcionalidade | Rota |
|--------------|-------|
| Página Inicial | / |
| Login | /login |
| Cadastro | /register |
| Detalhes do Evento | /events/{id} |
| Minhas Inscrições | /minhas-inscricoes |
| Administração de Eventos | /admin/events |

---

## 📚 Regras de Negócio

### Participante

- Pode visualizar eventos.
- Pode realizar inscrições.
- Pode cancelar inscrições.
- Pode consultar eventos inscritos.

### Organizador

- Pode criar eventos.
- Pode editar eventos.
- Pode excluir eventos.
- Pode gerenciar seus eventos.

---

## 🔒 Controle de Acesso

O sistema utiliza autenticação de usuários e separação de permissões para garantir que participantes e organizadores tenham acesso apenas às funcionalidades permitidas para seu perfil.

---

## 📈 Melhorias Futuras

- Upload de imagens para eventos.
- Sistema de busca avançada.
- Dashboard administrativo.
- Relatórios de participantes.
- Sistema de notificações.
- Confirmação de presença em eventos.

---

## 🎓 Projeto Acadêmico

Projeto desenvolvido para fins acadêmicos na disciplina **Programação Web III**, utilizando conceitos de:

- MVC
- Laravel Framework
- Banco de Dados Relacional
- Autenticação
- Controle de Acesso
- CRUD
- Relacionamentos entre entidades
- Desenvolvimento Web Full Stack

---

## 📄 Licença

Projeto desenvolvido exclusivamente para fins educacionais.