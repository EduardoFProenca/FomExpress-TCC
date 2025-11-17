<?php
/* Evita abrir diretamente sem login */
if (empty($_SESSION['usuario_id'])) {
    http_response_code(403);
    exit;
}
$idUsuario    = (int)$_SESSION['usuario_id'];
$nomeUsuario  = htmlspecialchars($_SESSION['usuario_nome']  ?? '');
$emailUsuario = htmlspecialchars($_SESSION['usuario_email'] ?? '');
?>

<div id="modalEditarPerfil" class="modal-editar-perfil">
  <div class="modal-conteudo-editar">
    <div class="modal-header-editar">
      <h3>✏️ Editar Perfil</h3>
      <button class="fechar-modal-editar" onclick="fecharModalEditarPerfil()">&times;</button>
    </div>

    <div class="modal-body-editar">
      <div id="mensagemEditar" style="display:none; margin-bottom:20px;">
        <div class="alert" role="alert" id="alertEditar">
          <span id="textoMensagemEditar"></span>
        </div>
      </div>

      <form id="formEditarPerfil">
        <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">

        <div class="input-box-editar">
          <label for="nome_editar">Nome Completo</label>
          <input type="text" id="nome_editar" name="nome" value="<?= $nomeUsuario ?>" required />
        </div>

        <div class="input-box-editar">
          <label for="email_editar">E-mail</label>
          <input type="email" id="email_editar" name="email" value="<?= $emailUsuario ?>" required />
        </div>

        <div class="input-box-editar">
          <label for="senha_atual">Senha Atual (obrigatório)</label>
          <input type="password" id="senha_atual" name="senha_atual" placeholder="Digite sua senha atual" required />
        </div>

        <div class="input-box-editar">
          <label for="nova_senha">Nova Senha (opcional)</label>
          <input type="password" id="nova_senha" name="nova_senha" placeholder="Deixe em branco para não alterar" />
        </div>

        <div class="botoes-modal-editar">
          <button type="button" class="btn-cancelar-editar" onclick="fecharModalEditarPerfil()">Cancelar</button>
          <button type="submit" class="btn-salvar-editar" id="btnSalvarEditar">💾 Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>