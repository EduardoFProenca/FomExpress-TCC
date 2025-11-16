document.getElementById('formReserva').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede o envio tradicional do formulário
    
    const form = this;
    const btnEnviar = document.getElementById('btnEnviar');
    const mensagemDiv = document.getElementById('mensagemReserva');
    const alertDiv = document.getElementById('alertReserva');
    const textoMensagem = document.getElementById('textoMensagem');
    
    // Visual feedback
    btnEnviar.innerHTML = '⏳ Enviando...';
    btnEnviar.disabled = true;
    
    // Oculta mensagem anterior
    mensagemDiv.style.display = 'none';
    
    // Coleta os dados do formulário
    const formData = new FormData(form);
    
    // Envia via AJAX
    fetch('../back-end/Reserva.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Mostra a mensagem
        mensagemDiv.style.display = 'block';
        
        if (data.sucesso) {
            alertDiv.className = 'alert alert-success';
            textoMensagem.innerHTML = '✅ ' + data.mensagem;
            form.reset(); // Limpa o formulário
        } else {
            alertDiv.className = 'alert alert-danger';
            textoMensagem.innerHTML = '❌ ' + data.mensagem;
        }
        
        // Restaura o botão
        btnEnviar.innerHTML = 'Enviar';
        btnEnviar.disabled = false;
        
        // Scroll suave para a mensagem
        mensagemDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Auto-ocultar após 5 segundos (sucesso apenas)
        if (data.sucesso) {
            setTimeout(() => {
                mensagemDiv.style.display = 'none';
            }, 5000);
        }
    })
    .catch(error => {
        // Erro de conexão
        mensagemDiv.style.display = 'block';
        alertDiv.className = 'alert alert-danger';
        textoMensagem.innerHTML = '❌ Erro ao enviar reserva. Tente novamente.';
        
        btnEnviar.innerHTML = 'Enviar';
        btnEnviar.disabled = false;
        
        console.error('Erro:', error);
    });
});

// Funcionalidade do botão Limpar
document.querySelector('button[type="reset"]').addEventListener('click', function() {
    document.getElementById('mensagemReserva').style.display = 'none';
});