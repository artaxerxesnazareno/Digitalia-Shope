<?php

// Conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'meu_banco_de_dados');

// Seleciona todos os dados da tabela
$sql = "SELECT * FROM minha_tabela";
$result = mysqli_query($conn, $sql);

// Verifica se existem dados
if (mysqli_num_rows($result) > 0) {
// Exibe os dados em uma tabela HTML
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nome</th>';
    echo '<th>Email</th>';
    echo '<th>Ação</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td><a href="deletar.php?id=' . $row['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Nenhum resultado encontrado';
}

// Fecha a conexão
mysqli_close($conn);

?>

<?php

// Conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'meu_banco_de_dados');

// Verifica se o ID foi passado
if (isset($_GET['id'])) {
// Prepara a query
    $sql = "DELETE FROM minha_tabela WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
// Executa a query
    mysqli_stmt_execute($stmt);
// Redireciona para a página inicial
    header('location: index.php');
}

// Fecha a conexão
mysqli_close($conn);

?>