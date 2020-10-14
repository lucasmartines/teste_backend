<div id="main" class="container-fluid">

    <h3 class="page-header">Atualizar Usuario: <?= $user["nome"] ?></h3>

	<form 
		action="<?php echo site_url()?>list/<?= $user["id"] ?>/edit" 
		method="post">

		<?php if(  session()->getFlashdata("updated_item_message" )  ):?>
			<div class="alert alert-success">	
				<?php echo session()->getFlashdata("updated_item_message") ;?>
			</div>
		<?php endif?>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
				<input 
					value="<?= $user["nome"] ?>"
					name="nome" type="text" class="form-control" id="nome" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="sobre_nome">Sobrenome</label>
				<input 
					value="<?= $user["sobre_nome"] ?>"	
					name="sobre_nome" type="text"class="form-control" id="sobre_nome" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="nascimento">Nascimento</label>
				<input
					value="<?= $user["nascimento"] ?>"
					name="nascimento" type="date" class="form-control" id="nascimento" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="email">E-Mail</label>
				<input 
					value="<?= $user["email"] ?>"
					name="email" type="email" class="form-control" id="email" placeholder="Digite o valor">
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="<?php echo site_url()?>list" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>


 <script src="<?php echo site_url() ?>js/jquery.min.js"></script>
 <script src="<?php echo site_url() ?>js/bootstrap.min.js"></script>
</body>
</html>