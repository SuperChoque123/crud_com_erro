<?php
// Edição com erro de lógica (não busca o ID corretamente)
include("conexao.php");
$id = isset($_GET['id']) ? (int) $_GET['id'] :0;
$sql = "SELECT * FROM usuarios WHERE id = $id";
$res = mysqli_query($conn, $sql);
$dado = mysqli_fetch_assoc($res);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
<form method="POST" action="editar.php?id=<?php echo $dado['id'] ?>">
    <label for="salvar">nome:</label>
    <input type="text" name="nome" value="<?php echo $dado ['user'] ?>"><br>
    <label for="salvar">Email:</label>
    <input type="submit" value="Salvar">
</form>
