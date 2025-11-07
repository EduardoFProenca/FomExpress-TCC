// ===============================
// CARRINHO.JS - VERSÃO CORRIGIDA
// ===============================

// ===============================
// ADICIONAR ITEM AO CARRINHO
// ===============================
function adicionarAoCarrinho(nome, preco) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    const itemExistente = carrinho.find(item => item.nome === nome);

    if (itemExistente) {
        itemExistente.quantidade++;
    } else {
        carrinho.push({ 
            nome: nome, 
            preco: preco, 
            quantidade: 1 
        });
    }

    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    
    // Notificação elegante
    mostrarNotificacao(`${nome} adicionado ao carrinho!`);
    
    // Atualizar contador e modal
    window.dispatchEvent(new Event('carrinhoAtualizado'));
}

// ===============================
// NOTIFICAÇÃO ELEGANTE
// ===============================
function mostrarNotificacao(mensagem) {
    // Remove notificação existente
    const notifExistente = document.getElementById('notificacao-carrinho');
    if (notifExistente) {
        notifExistente.remove();
    }
    
    // Cria nova notificação
    const notificacao = document.createElement('div');
    notificacao.id = 'notificacao-carrinho';
    notificacao.innerHTML = `
        <div style="
            position: fixed;
            top: 20px;
            right: 20px;
            background: #ff9100;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(255, 145, 0, 0.4);
            z-index: 10000;
            animation: slideIn 0.3s ease-out;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        ">
            ✅ ${mensagem}
        </div>
        <style>
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
        </style>
    `;
    
    document.body.appendChild(notificacao);
    
    // Remove após 3 segundos
    setTimeout(() => {
        if (notificacao.parentNode) {
            notificacao.remove();
        }
    }, 3000);
}

// ===============================
// FUNÇÕES PARA A PÁGINA CARRINHO.HTML
// ===============================
function renderizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    const container = document.getElementById("carrinho");

    if (carrinho.length === 0) {
        container.innerHTML = `
            <div style="text-align: center; padding: 40px;">
                <p style="font-size: 18px; color: #666; margin-bottom: 20px;">
                    🛒 Seu carrinho está vazio
                </p>
                <button class="btn-voltar" onclick="window.location.href='cardapio.html'" 
                    style="background: #046f6f; color: white; border: none; padding: 10px 20px; 
                           border-radius: 5px; cursor: pointer; font-family: 'Montserrat', sans-serif;">
                    ← Voltar ao Cardápio
                </button>
            </div>
        `;
        return;
    }

    let html = `
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background: #046f6f; color: white;">
                <th style="padding: 15px; text-align: left;">Item</th>
                <th style="padding: 15px; text-align: center;">Preço</th>
                <th style="padding: 15px; text-align: center;">Qtd</th>
                <th style="padding: 15px; text-align: center;">Subtotal</th>
                <th style="padding: 15px; text-align: center;">Ações</th>
            </tr>
    `;

    let total = 0;

    carrinho.forEach((item, index) => {
        const subtotal = item.preco * item.quantidade;
        total += subtotal;

        html += `
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 15px; font-weight: bold;">${item.nome}</td>
                <td style="padding: 15px; text-align: center;">R$ ${item.preco.toFixed(2)}</td>
                <td style="padding: 15px; text-align: center;">
                    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <button class="btn-qtd" onclick="alterarQtd(${index}, -1)" 
                            style="background: #046f6f; color: white; border: none; 
                                   width: 30px; height: 30px; border-radius: 50%; cursor: pointer;">
                            -
                        </button>
                        <span style="font-weight: bold;">${item.quantidade}</span>
                        <button class="btn-qtd" onclick="alterarQtd(${index}, 1)"
                            style="background: #046f6f; color: white; border: none; 
                                   width: 30px; height: 30px; border-radius: 50%; cursor: pointer;">
                            +
                        </button>
                    </div>
                </td>
                <td style="padding: 15px; text-align: center; font-weight: bold;">
                    R$ ${subtotal.toFixed(2)}
                </td>
                <td style="padding: 15px; text-align: center;">
                    <button class="btn-remover" onclick="removerItem(${index})"
                        style="background: #ff4444; color: white; border: none; 
                               padding: 8px 12px; border-radius: 5px; cursor: pointer;">
                        🗑️ Remover
                    </button>
                </td>
            </tr>
        `;
    });

    html += `</table>
        <div style="text-align: right; margin: 30px 0;">
            <div style="font-size: 24px; font-weight: bold; color: #046f6f;">
                Total: R$ ${total.toFixed(2)}
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; margin-top: 30px;">
            <button class="btn-voltar" onclick="window.location.href='cardapio.html'"
                style="background: #777; color: white; border: none; padding: 12px 25px; 
                       border-radius: 8px; cursor: pointer; font-weight: bold; font-family: 'Montserrat', sans-serif;">
                ← Continuar Comprando
            </button>
            <button class="btn-finalizar" onclick="finalizarCompra()"
                style="background: #046f6f; color: white; border: none; padding: 12px 25px; 
                       border-radius: 8px; cursor: pointer; font-weight: bold; font-family: 'Montserrat', sans-serif;">
                ✅ Finalizar Pedido
            </button>
        </div>
    `;

    container.innerHTML = html;
}

function alterarQtd(index, valor) {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    carrinho[index].quantidade += valor;
    
    if (carrinho[index].quantidade <= 0) {
        carrinho.splice(index, 1);
    }
    
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    renderizarCarrinho();
    
    // Atualizar outras páginas
    window.dispatchEvent(new Event('carrinhoAtualizado'));
}

function removerItem(index) {
    if (confirm("Tem certeza que deseja remover este item?")) {
        const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
        carrinho.splice(index, 1);
        localStorage.setItem("carrinho", JSON.stringify(carrinho));
        renderizarCarrinho();
        
        // Atualizar outras páginas
        window.dispatchEvent(new Event('carrinhoAtualizado'));
    }
}

function finalizarCompra() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    
    if (carrinho.length === 0) {
        alert("Seu carrinho está vazio!");
        return;
    }

    const total = carrinho.reduce((soma, item) => soma + (item.preco * item.quantidade), 0);
    
    alert(`🎉 Pedido finalizado!\nTotal: R$ ${total.toFixed(2)}\n\nEm breve integraremos com o back-end Java!`);
    
    // Limpar carrinho
    localStorage.removeItem("carrinho");
    renderizarCarrinho();
    
    // Atualizar outras páginas
    window.dispatchEvent(new Event('carrinhoAtualizado'));
    
    // Redirecionar para home após 2 segundos
    setTimeout(() => {
        window.location.href = "home.php";
    }, 2000);
}

// ===============================
// INICIALIZAÇÃO
// ===============================
if (window.location.pathname.includes('carrinho.html')) {
    document.addEventListener('DOMContentLoaded', function() {
        renderizarCarrinho();
    });
}