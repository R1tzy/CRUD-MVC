<?php 
require "../src/View/includes/header.php";

while ($linha = $dados->fetch(PDO::FETCH_ASSOC)){
?>

<header>
    <h1>Alterar Cliente</h1>
</header>

<form action="/cliente/atualizar/<?=$linha['id']?>" method="POST">
    <div class="row mt-3">
        <div class="col-5">
            <label for="nome" class="form-label">Nome</label>
            <input value="<?= $linha["nome"]?>" type="text" class="form-control" name="nome" id="nome" placeholder="Thiago" required/>
        </div>
        <div class="col-5">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input value="<?=$linha["sobrenome"]?>" type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Lopes" required/>
        </div>
        <div class="col-2">
            <label for="idade" class="form-label">Idade</label>
            <input value="<?=$linha["idade"]?>" type="number" class="form-control" name="idade" id="idade" placeholder="20" min="0" max="120" required/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label for="email" class="form-label">Email:</label>
            <input value="<?=$linha["email"]?>" type="email" class="form-control" name="email" id="email" placeholder="lopes@hotmail.com" required/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-success">Alterar</button>
        </div>
    </div>
</form>

<?php 
}
require "../src/View/includes/footer.php";?>