<div id="main" class="container-fluid">

    <h3 class="page-header">Adicionar Item</h3>

    <form action="<?php echo site_url("list/create") ?>" method="post">
            
		<?php if(  session()->getFlashdata("saved_item_message" )  ):?>
			<div class="alert alert-success">	
				<?php echo session()->getFlashdata("saved_item_message") ;?>
			</div>
		<?php endif?>

        <?php if( isset( $validation) ): ?>
            <div class="alert alert-danger">	
				<?php echo $validation->listErrors() ?>
			</div>
        <?php endif ?>
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input value="<?php echo set_value("nome")?>" required  name="nome" type="text" class="form-control" id="nome" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="sobre_nome">Sobrenome</label>
                <input
                    value="<?php echo set_value("sobre_nome")?>"
					name="sobre_nome" type="text"
                    class="form-control" id="sobre_nome" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="nascimento">Nascimento</label>
                <input 
                    value="<?php echo set_value("nascimento")?>"
                    required name="nascimento" type="date" class="form-control" id="nascimento" placeholder="Digite o valor">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="email">E-Mail</label>
                <input
                    value="<?php echo set_value("email")?>"
                    required name="email" type="email" class="form-control" id="email" placeholder="Digite o valor">
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?php echo site_url()?>list" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>


<script src="<?php echo site_url() ?>js/jquery.min.js"></script>
<script src="<?php echo site_url() ?>js/bootstrap.min.js"></script>
<script src="<?php echo site_url() ?>js/main.js"></script>
</body>

</html>