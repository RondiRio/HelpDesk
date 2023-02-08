    <?php
session_start();

$protocolo = rand(0, 3000);
$titulo = str_replace('#', '-', $_POST['titulo']);
$categoria = str_replace('#', '-', $_POST['categoria']);
$descricao =str_replace('#', '-', $_POST['descricao']);


$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a');

$texto = $_SESSION['id']. '#' . $titulo.'#'.$categoria.'#'. "Protocolo: ".$protocolo .'#'. $descricao. PHP_EOL;
fwrite($arquivo, $texto);
fclose($arquivo);

header('Location: abrir_chamado.php');
?>