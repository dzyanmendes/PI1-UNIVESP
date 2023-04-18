  <main class="container mt-4">
    <div class="bg-light p-5 rounded">
      <h1>Cadastro de Visitantes</h1>
      <div class="container px-5 my-5">
        <form id="contactForm" action="<?php echo base_url().'/Visitantes'; ?>" method="post">
          <div class="mb-3">
            <label class="form-label" for="codigo">Codigo</label>
            <input class="form-control" id="codigo" name="codigo" type="text" placeholder="Codigo" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->codigo; } else {echo '0'; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="cpf  ">CPF</label>
            <input class="form-control" id="cpf" name="cpf" type="text" placeholder="cpf" data-mask="000.000.000-00" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->cpf; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="nome">nome</label>
            <input class="form-control" id="nome" name="nome" type="text" placeholder="nome" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->nome; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="nascimento">nascimento</label>
            <input class="form-control" id="nascimento" name="nascimento" type="date" placeholder="bairro" data-sb-validations="" required="false" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->nascimento; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="telefone">telefone</label>
            <input class="form-control" id="telefone" name="telefone" type="text" placeholder="telefone" data-mask="(00)#0000-0000" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->telefone; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="observacao">observação</label>
            <input class="form-control" id="observacao" name="observacao" type="text" placeholder="observacao" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->observacao; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="data_entrada">data entrada</label>
            <input class="form-control" id="data_entrada" name="data_entrada" type="datetime-local" placeholder="data_entrada" data-sb-validations="" required="false" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->data_entrada; } else {echo gmdate('Y-m-d h:i:s', time()); } ?>"/>
          </div>
          <!--<div class="mb-3">
            <label class="form-label" for="acampamento">acampamento</label>
            <input class="form-control" id="acampamento" name="acampamento" type="text" placeholder="acampamento" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->acampamento; } else {echo ''; } ?>"/>
          </div>-->
          <div class="mb-3">
            <label class="form-label d-block">acampamento</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" id="S" type="radio" name="acampamento" value="S" data-sb-validations="" <?php if ($selecionado!=NULL) 
                                                                                                                        { 
                                                                                                                          if ($selecionado[0]->acampamento=='S'){ 
                                                                                                                              echo "checked"; 
                                                                                                                          } else { echo ''; }
                                                                                                                        } else { 
                                                                                                                          echo ''; 
                                                                                                                        } 
                                                                                                              ?> 
                                                                                                              >
              <label class="form-check-label" for="S">S</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" id="N" type="radio" name="acampamento" value="N" data-sb-validations="" <?php 
                                                                                                                  if ($selecionado!=NULL) { 
                                                                                                                    if ($selecionado[0]->acampamento=='N'){
                                                                                                                       echo "checked";
                                                                                                                    } else { 
                                                                                                                      echo ''; 
                                                                                                                    } 
                                                                                                                  } else {
                                                                                                                      echo ''; 
                                                                                                                  } 
                                                                                                            ?>>
              <label class="form-check-label" for="N">N</label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="placa">placa</label>
            <input class="form-control" id="placa" name="placa" type="text" placeholder="placa" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->placa; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="contato_emergencia_nome">nome contato de emergencia</label>
            <input class="form-control" id="contato_emergencia_nome" name="contato_emergencia_nome" type="text" placeholder="contato_emergencia_nome" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->contato_emergencia_nome; } else {echo ''; } ?>"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="contato_emergencia_telefone">telefone contato emergencia</label>
            <input class="form-control" id="contato_emergencia_telefone" name="contato_emergencia_telefone"  data-mask="(00)#0000-0000" type="text" placeholder="contato_emergencia_telefone" data-sb-validations="" value="<?php if ($selecionado!=NULL) { echo $selecionado[0]->contato_emergencia_telefone; } else {echo ''; } ?>"/>
          </div>
          <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
              <div class="fw-bolder">Form submission successful!</div>
              <p>To activate this form, sign up at</p>
              <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
          </div>
          <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Cadastrar!</button>
          </div>
        </form>
      </div>
    </div>

    <div class="bg-light p-5 rounded">
      <h1>Visitantes Cadastrados</h1>
      <div class="container px-5 my-5">
        <table class="table table-hover table-sm">
          <tr>
                <th>Codigo</th>
                <th>CPF</th>
                <th>Nome</th>
                <th>Acampamento?</th>
                <th>Data Entrada</th>
                <!--<th>Nome</th>-->
                <th>Data Saida</th>
                <th>Telefone</th>
                <th>Modificar</th>
                <th>Marcar Saida</th>
                <th>Excluir</th>
          </tr>
          <?php foreach ($result as $row) {?>
          <tr>
                <td><?php echo $row->codigo; ?></td>
                <td><?php echo $row->cpf; ?></td>
                <td><?php echo $row->nome; ?></td>
                <td><?php echo $row->acampamento; ?></td>
                <!--<td>Nome</td>-->
                <td><?php echo $row->data_entrada; ?></td>
                <td><?php echo $row->data_saida; ?></td>
                <td><?php echo $row->telefone; ?></td>
                <td><a class="btn btn-success btn-sm" href="<?php echo base_url()."/Visitantes/index/".$row->codigo; ?>">Alterar</a></td>
                <td>
                  <?php if ($row->data_saida==null) {?>
                  <a class="btn btn-warning btn-sm" href="<?php echo base_url()."/Visitantes/saida/".$row->codigo; ?>">Retornou</a>
                  <?php }?>
                </td>
                <td><a class="btn btn-danger btn-sm" href="<?php echo base_url()."/Visitantes/index/".$row->codigo.'/delete'; ?>">Excluir</a></td>
          
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>

<script>
  $(document).ready(function(){
    $('#telefone').mask('(00)90000-0000');
    $('#contato_emergencia_telefone').mask('(00)90000-0000');
    $('#cpf').mask('000.000.000-00');
  });
</script>