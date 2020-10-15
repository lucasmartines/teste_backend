<div id="main" class="container-fluid" style="margin-top: 50px">

    <div id="top" class="row">

        <div class="col-sm-3">
            <h2>Itens</h2>
        </div>

        <div class="col-sm-6">
            <form action="<?php echo site_url() ?>list/search" action="GET">
                <div class="input-group h2">
                    <input value="<?php if( isset( $search )){ echo $search; }?>" name="search" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"  >
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>

        </div>
        <div class="col-sm-3">
            <a href="<?php echo site_url() ?>list/create" class="btn btn-primary pull-right h2">Novo Item</a>
        </div>
    </div> <!-- /#top -->

    <?php if(  session()->getFlashdata("user_deleted_success" )  ):?>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success">
					<?php echo session()->getFlashdata("user_deleted_success") ;?>
				</div>
			</div>
		</div>
	<?php endif?>
	
	
    <?php if(  session()->getFlashdata("saved_item_message" )  ):?>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-success">
					<?php echo session()->getFlashdata("saved_item_message") ;?>
				</div>
			</div>
		</div>
    <?php endif?>


   
    <hr />
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Nascimento</th>
                        <th>E-mail</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( isset( $users ) ) : ?>
                        <?php if (is_array($users) && !empty($users)) : ?>
                            <?php foreach ($users as $user_item) : ?>
                                <tr id="<?= $user_item['id'] ?>">
                                    <td><?php echo  $user_item['id'] ?></td>
                                    <td><?php echo  $user_item['nome']  ?></td>
                                    <td><?php echo  $user_item['sobre_nome']  ?></td>
                                    <td>
                                        <?php $date = new DateTime(  $user_item['nascimento'] ); ?>
                                        <?php echo $date->format("d/m/Y")   ?>
                                    </td>
                                    <td><?php echo  $user_item['email']  ?></td>
                                    <td class="actions">

                                        <a class="btn btn-success btn-xs" href="<?php echo site_url() ?>list">Visualizar</a>
                                        <a class="btn btn-warning btn-xs"
                                            href="<?php echo site_url() ?>list/<?php echo esc($user_item['id']) ?>/edit">Editar</a>
                                        <a data-delete_id="<?= $user_item['id'] ?>" class="btn btn-danger btn-xs delete_button"
                                            href="#" data-toggle="modal" data-target="#delete-modal">
                                            Excluir</a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif  ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

    </div> <!-- /#list -->

                    
    <?php if (  isset($pager)  ) : ?>
        <div id="bottom" class="row">
            <div class="col-md-12">
                <ul class="pagination">
                    <?= $pager->links() ?>
                </ul>
            </div>
        </div> <!-- /#bottom -->
    <?php endif; ?>
  
<!-- Modal -->
    <!--<div id="bottom" class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul> 
		</div>
	</div> 
 </div>   -->

  
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="" id="form_delete_user">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir este item?
                </div>
                <div class="modal-footer">
                    <button type="submit" id="confirm_delete_buttn" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo site_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo site_url() ?>js/bootstrap.min.js"></script>

    <script src="<?php echo site_url() ?>js/main.js"></script>
    <script src="<?php echo site_url() ?>js/user/delete.js?>"> </script>
    

    </body>

    </html>