const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

let circles = [];
let score = 0; // Pontuação inicial
let gameInterval;
let nextCircleTime = 0;
let currentMultiplication;
let totalPointsNeeded;
let currentAnswer = '';
let isAnswerCorrect = false;

const circleRadius = 30;
const speed = 5;
const hitZoneY = canvas.height - 70; // Linha de acerto

// Carregando o som
const sound = new Audio('https://www.soundjay.com/button/beep-07.wav'); // Link para o som

// Função para gerar um círculo em uma das 4 linhas diferentes
function generateCircle() {
  // Gerar um círculo em uma das 4 linhas diferentes
  const lines = [
    { x: 100, y: -circleRadius },  // Linha para a tecla 'a'
    { x: 200, y: -circleRadius },  // Linha para a tecla 's'
    { x: 300, y: -circleRadius },  // Linha para a tecla 'k'
    { x: 400, y: -circleRadius }   // Linha para a tecla 'l'
  ];

  // Escolher aleatoriamente uma linha para gerar o círculo
  const randomIndex = Math.floor(Math.random() * 4);
  const selectedLine = lines[randomIndex];
  
  const color = 'rgb(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ')';
  
  circles.push({ ...selectedLine, color, lineIndex: randomIndex });
}

// Função para atualizar o jogo
function updateGame() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Desenha a linha de acerto
  ctx.beginPath();
  ctx.moveTo(0, hitZoneY);
  ctx.lineTo(canvas.width, hitZoneY);
  ctx.strokeStyle = 'white';
  ctx.lineWidth = 20;
  ctx.stroke();

  // Desenha as "notas" (círculos) nas 4 linhas
  circles.forEach((circle, index) => {
    circle.y += speed; // move para baixo

    if (circle.y > canvas.height) {
      circles.splice(index, 1); // Remove o círculo se ultrapassar a tela
    }

    ctx.beginPath();
    ctx.arc(circle.x, circle.y, circleRadius, 0, Math.PI * 2);
    ctx.fillStyle = circle.color;
    ctx.fill();
  });

  // Desenha o score
  ctx.font = '20px Arial';
  ctx.fillStyle = 'white';
  ctx.fillText('Score: ' + score, 10, 30);

  // Desenha a pergunta de multiplicação
  ctx.font = '25px Arial';
  ctx.fillText(`Qual é ${currentMultiplication[0]} × ${currentMultiplication[1]} ?`, canvas.width / 2 - 130, 50);

  // Desenha a resposta digitada pelo jogador
  ctx.font = '20px Arial';
  ctx.fillText('Sua resposta: ' + currentAnswer, canvas.width / 2 - 100, 100);

  // Geração de novos círculos a cada 2 segundos
  const currentTime = Date.now();
  if (currentTime >= nextCircleTime) {
    generateCircle();
    nextCircleTime = currentTime + 2000; // Novo círculo a cada 2 segundos
  }

  // Verifica se o jogador atingiu o número correto de pontos
  if (score >= totalPointsNeeded) {
    startNewRound(); // Começa uma nova rodada com outra pergunta de multiplicação
  }
}

// Função de verificação quando a tecla Enter é pressionada
function keyPressHandler(event) {
  if (event.key === 'Enter') {
    // Verifica se a resposta do jogador está correta
    if (parseInt(currentAnswer) === currentMultiplication[0] * currentMultiplication[1]) {
      score += 1; // Incrementa 1 ponto para resposta correta
      sound.play(); // Toca o som de acerto
      
    } else {
      score -= 1; // Penalidade de 1 ponto para resposta errada
     
    }

    // Reseta a resposta para o próximo ciclo
    currentAnswer = '';
    startNewRound(); // Gera uma nova pergunta, seja certa ou errada
  }
}

// Função para capturar a digitação da resposta
function handleKeyPress(event) {
  if (event.key >= '0' && event.key <= '9') {
    currentAnswer += event.key; // Concatena o número digitado
  }
}

// Função para começar uma nova rodada com uma nova pergunta de multiplicação
function startNewRound() {
  // Gerar uma nova pergunta de multiplicação
  currentMultiplication = [Math.floor(Math.random() * 9) + 1, Math.floor(Math.random() * 9) + 1];  // Nova pergunta de multiplicação
  totalPointsNeeded = currentMultiplication[0] * currentMultiplication[1];  // Define o número de pontos necessários

  // Limpa os círculos da tela
  circles = [];
}

// Inicializa o jogo
function startGame() {
  startNewRound();  // Inicia a primeira rodada
  gameInterval = setInterval(updateGame, 1000 / 60); // Atualiza o jogo a 60 FPS
  document.addEventListener('keydown', handleKeyPress); // Detecta a digitação da resposta
  document.addEventListener('keydown', keyPressHandler);  // Verifica a resposta com Enter
}

startGame();
