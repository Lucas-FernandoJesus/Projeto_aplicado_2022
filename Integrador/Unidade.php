<?php
    
    include('Conexao.php');
    include('Menu.php');
    include('Style/bootstrap.php');

?>

<link rel="stylesheet" href="style.css">

<title>Unidade</title>

<div class="form-pessoa">
    <div class="form-header">
        <h1>Unidade</h1>
    </div>
    <form class="form-pesquisa" action="Unidade.php" method="POST">
        <input name="busca" value="<?php if(isset($_POST['busca'])) echo $_POST['busca']; ?>"
            placeholder="Digite os ID desejado para pesquisa" type="text">
        <div class="pesquisa-button">
            <button type="submit" id= "submit">Pesquisar</button>
            <button id="submit"><a href="cadastroUnidade.php" id = "c">Cadastrar</a></button >
        </div>
    </form>
</div>

<table class="resultado-pessoa">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>CNPJ</th>
    </tr>
    <?php
    if (!isset($_POST['busca'])) {
        ?>
    <tr>
        <td colspan="3"></td>
    </tr>
<?php
    }else {
        $pesquisa = $mysqli->real_escape_string($_POST['busca']);
        $sql_code = "SELECT * 
            FROM unidade u
            WHERE u.UNIDADE_ID = ('$pesquisa')";

        $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);

        if ($sql_query->num_rows == 0){
            ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
        <?php
            }
            else{
                while($dados = $sql_query->fetch_assoc()){
            ?>
        <tr>
            <td>
                <?php echo $dados['UNIDADE_ID'];?>
            </td>
            <td>
                <?php echo $dados['RAZAO_SOCIAL'];?>
            </td>
            <td>
                <?php echo $dados['CNPJ'];?>
            </td>
        </tr>
        <?php
            }
        }
        ?>
        <?php
    }?>

</table>