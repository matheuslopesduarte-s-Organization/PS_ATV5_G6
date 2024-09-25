<!DOCTYPE html>
<html>
<head>
    <title>Novo Empréstimo Criado</title>
</head>
<body>
    <h1>Novo Empréstimo Criado</h1>
    <p>Um novo empréstimo foi criado.</p>
    <p><strong>Usuário:</strong> {{ $loan->user->name }}</p>
    <p><strong>Data do Empréstimo:</strong> {{ $loan->loan_date }}</p>
    <p><strong>Data Limite para Devolução:</strong> {{ $loan->return_deadline }}</p>
</body>
</html>
