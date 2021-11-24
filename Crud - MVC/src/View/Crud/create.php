<?php require "../src/View/includes/header.php";?>

<header>
    <h1>Novo Cliente</h1>
</header>

<form action="/cliente/salvar" method="POST">
    <div class="row mt-3">
        <div class="col-5">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Thiago" required/>
        </div>
        <div class="col-5">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Lopes" required/>
        </div>
        <div class="col-2">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" class="form-control" name="idade" id="idade" placeholder="20" min="0" max="120" required/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="lopes@hotmail.com" required/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>


<?php require "../src/View/includes/footer.php";?>