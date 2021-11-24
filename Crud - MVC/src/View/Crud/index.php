<?php require "../src/View/includes/header.php";?>

<header>
    <h1>Clientes</h1>
</header>


<?php
    session_start();
    if(isset($_SESSION["resultado"])){
        $resultado = $_SESSION["resultado"];
        echo "<div class='alert alert-info'>$resultado</div>";
    }
    
?>
<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($linha=$dados->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr>
                        <td><?php echo $linha['id'];?></td>
                        <td><?php echo $linha['nome'];?></td>
                        <td><?php echo $linha['sobrenome']; ?></td>
                        <td><?php echo $linha['idade'];?></td>
                        <td><?php echo $linha['email'];?></td>
                        <td><a class="btn btn-primary" href="/cliente/alterar/<?=$linha['id']?>"><i class="bi bi-pencil-fill"></i>Alterar</a></td>
                        <td><a class="btn btn-danger" href="/cliente/excluir/<?=$linha['id']?>"><i class="bi bi-trash-fill"></i>Excluir</a></td>
                    </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</div>
<div class="mt-4">
    <a class="btn btn-success" href="/cliente/novo">Novo Cliente</a>
</div>
<?php require "../src/View/includes/footer.php";?>



