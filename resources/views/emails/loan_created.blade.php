<!DOCTYPE html>
<html>
<head>
    <title>Novo Empréstimo Criado</title>
</head>
<body>
    <h1>Olá, {{ $loan->user->name }}!</h1>
    <p>Seu empréstimo do livro "{{ $loan->book->title }}" foi criado com sucesso.</p>
    <p>Data do Empréstimo: {{ $loan->loan_date }}</p>
    <p>Data Limite para Devolução: {{ $loan->return_deadline }}</p>
    <p>Obrigado por utilizar nosso serviço!</p>
</body>
</html>
