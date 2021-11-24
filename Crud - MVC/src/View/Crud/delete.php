<?php 
require "../src/View/includes/header.php";

while ($linha = $dados->fetch(PDO::FETCH_ASSOC)){
?>

<header>
    <h1>Excluir Cliente</h1>
</header>

<form action="/cliente/remover/<?php echo $linha['id']?>" method="POST">
    <div class="row mt-3">
        <div class="col-5">
            <label for="nome" class="form-label">Nome</label>
            <input disabled value="<?php echo $linha["nome"]?>" type="text" class="form-control" name="nome" id="nome"/>
        </div>
        <div class="col-5">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input disabled value="<?php echo $linha["sobrenome"]?>" type="text" class="form-control" name="sobrenome" id="sobrenome"/>
        </div>
        <div class="col-2">
            <label for="idade" class="form-label">Idade</label>
            <input disabled value="<?php echo $linha["idade"]?>" type="number" class="form-control" name="idade" id="idade"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label for="email" class="form-label">Email:</label>
            <input disabled value="<?php echo $linha["email"]?>" type="email" class="form-control" name="email" id="email"/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
    </div>
</form>

<?php 
}
require "../src/View/includes/footer.php";?>