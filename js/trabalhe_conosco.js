document.getElementById('formTrabalheConosco').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const btnEnviar = document.getElementById('btnEnviarTrabalhe');
    const mensagemDiv = document.getElementById('mensagemTrabalhe');
    const alertDiv = document.getElementById('alertTrabalhe');
    const textoMensagem = document.getElementById('textoMensagemTrabalhe');
    
    // Validação do arquivo
    const fileInput = document.getElementById('curriculo');
    const file = fileInput.files[0];
    
    if (file) {
        // Validar tamanho (5MB = 5242880 bytes)
        if (file.size > 5242880) {
            mostrarMensagem('❌ O arquivo é muito grande. Tamanho máximo: 5MB', 'danger');
            return;
        }
        
        // Validar tipo
        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (!allowedTypes.includes(file.type)) {
            mostrarMensagem('❌ Formato inválido. Envie PDF, DOC ou DOCX', 'danger');
            return;
        }
    }
    
    // Visual feedback
    btnEnviar.innerHTML = '⏳ Enviando currículo...';
    btnEnviar.disabled = true;
    mensagemDiv.style.display = 'none';
    
    // Coleta os dados
    const formData = new FormData(form);
    
    // Envia via AJAX
    fetch('processa_trabconosco.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            mostrarMensagem('✅ ' + data.mensagem, 'success');
            form.reset();
            
            // Auto-ocultar após 7 segundos
            setTimeout(() => {
                mensagemDiv.style.display = 'none';
            }, 7000);
        } else {
            mostrarMensagem('❌ ' + data.mensagem, 'danger');
        }
        
        btnEnviar.innerHTML = 'Enviar';
        btnEnviar.disabled = false;
    })
    .catch(error => {
        mostrarMensagem('❌ Erro ao enviar. Tente novamente.', 'danger');
        btnEnviar.innerHTML = 'Enviar';
        btnEnviar.disabled = false;
        console.error('Erro:', error);
    });
});

// Função auxiliar para mostrar mensagens
function mostrarMensagem(texto, tipo) {
    const mensagemDiv = document.getElementById('mensagemTrabalhe');
    const alertDiv = document.getElementById('alertTrabalhe');
    const textoMensagem = document.getElementById('textoMensagemTrabalhe');
    
    mensagemDiv.style.display = 'block';
    alertDiv.className = 'alert alert-' + tipo;
    textoMensagem.innerHTML = texto;
    
    // Scroll suave para o topo do formulário
    const container = document.querySelector('#link_trabconosco');
    container.scrollIntoView({ behavior: 'smooth', block: 'start' });
}