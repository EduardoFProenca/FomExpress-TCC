-- =========================================================
-- phpMyAdmin SQL Dump
-- Versão: 5.2.1
-- Host: 127.0.0.1
-- Gerado em: 17 de outubro de 2025 às 20:57
-- Servidor: MySQL 8.0.43
-- PHP: 8.2.12
-- =========================================================

-- ---------------------------------------------------------
-- CONFIGURAÇÕES INICIAIS
-- ---------------------------------------------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- ---------------------------------------------------------
-- BANCO DE DADOS: dbfomexpress
-- ---------------------------------------------------------

-- ---------------------------------------------------------
-- ESTRUTURA DA TABELA: reserva
-- ---------------------------------------------------------

-- Dados de exemplo para a tabela `reserva`
INSERT INTO `reserva` (`id`, `nome`, `email`, `qtd_pessoas`, `data_hora`) VALUES
(1, 'Felipe Oliveira', 'felipekkkkkkkkkkk@gmail.com', 3, '2025-10-09 17:01:11');

-- Índices para a tabela `reserva`
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT para a tabela `reserva`
ALTER TABLE `reserva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;

-- Restaura configurações de charset
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- =========================================================
-- TABELA: usuario
-- Descrição: Armazena dados de login e cadastro de usuários
-- =========================================================
CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(20),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- TABELA: reserva
-- Descrição: Armazena reservas de mesas do restaurante
-- =========================================================
CREATE TABLE IF NOT EXISTS reserva (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL COMMENT 'Nome completo do cliente',
  email VARCHAR(100) NOT NULL COMMENT 'Email para contato',
  qtd_pessoas INT NOT NULL COMMENT 'Quantidade de pessoas',
  data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e hora da reserva',
  status VARCHAR(50) DEFAULT 'Pendente' COMMENT 'Status: Pendente, Confirmada, Cancelada',
  INDEX idx_email (email),
  INDEX idx_data (data_hora),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Reservas de mesas do restaurante';

-- ---------------------------------------------------------
-- SELECIONA O BANCO DE DADOS: fomexpress_db
-- ---------------------------------------------------------
USE fomexpress_db;

-- =========================================================
-- TABELA: candidatos
-- Descrição: Armazena currículos enviados por candidatos
-- =========================================================
CREATE TABLE IF NOT EXISTS candidatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    celular VARCHAR(20),
    cidade VARCHAR(100),
    estado VARCHAR(50),
    genero VARCHAR(20),
    curriculo VARCHAR(255),
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_data (data_envio)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;