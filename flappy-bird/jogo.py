import pygame
import random

# Inicializar Pygame
pygame.init()

# Configurações da tela
WIDTH, HEIGHT = 400, 600
screen = pygame.display.set_mode((WIDTH, HEIGHT))
pygame.display.set_caption("Flappy Bird")

# Cores
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)
GREEN = (0, 255, 0)

# Configurações do jogo
clock = pygame.time.Clock()
FPS = 60

# Carregar imagens
bird_img = pygame.image.load('bird.png')
bird_img = pygame.transform.scale(bird_img, (40, 30))  # Redimensionar a imagem para o tamanho do pássaro
background_img = pygame.image.load('background.png')
background_img = pygame.transform.scale(background_img, (WIDTH, HEIGHT))  # Redimensionar a imagem de fundo para o tamanho da tela

# Configurações do pássaro
BIRD_WIDTH, BIRD_HEIGHT = bird_img.get_width(), bird_img.get_height()
bird_x = WIDTH // 4
gravity = 0.6
jump = -10

# Configurações dos canos
PIPE_WIDTH, PIPE_HEIGHT = 70, HEIGHT
pipe_gap = 150
pipe_speed = 3

# Fonte
font = pygame.font.SysFont(None, 55)

def draw_bird(x, y):
    screen.blit(bird_img, (x, y))

def draw_pipes(x, y):
    pygame.draw.rect(screen, GREEN, [x, y, PIPE_WIDTH, PIPE_HEIGHT])
    pygame.draw.rect(screen, GREEN, [x, y + PIPE_HEIGHT + pipe_gap, PIPE_WIDTH, PIPE_HEIGHT])

def check_collision(bird_x, bird_y, pipe_x, pipe_y):
    if bird_x + BIRD_WIDTH > pipe_x and bird_x < pipe_x + PIPE_WIDTH:
        if bird_y < pipe_y + PIPE_HEIGHT or bird_y + BIRD_HEIGHT > pipe_y + PIPE_HEIGHT + pipe_gap:
            return True
    if bird_y > HEIGHT or bird_y < 0:
        return True
    return False

def show_message(text, color, y_displacement=0):
    text_surface = font.render(text, True, color)
    text_rect = text_surface.get_rect(center=(WIDTH / 2, HEIGHT / 2 + y_displacement))
    screen.blit(text_surface, text_rect)
    pygame.display.update()

def game_loop():
    bird_y = HEIGHT // 2
    bird_y_change = 0
    pipe_x = WIDTH
    pipe_y = random.randint(-PIPE_HEIGHT + pipe_gap, 0)
    score = 0
    passed_pipe = False
    running = True

    while running:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                pygame.quit()
                quit()
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_SPACE:
                    bird_y_change = jump

        bird_y_change += gravity
        bird_y += bird_y_change

        pipe_x -= pipe_speed
        if pipe_x < -PIPE_WIDTH:
            pipe_x = WIDTH
            pipe_y = random.randint(-PIPE_HEIGHT + pipe_gap, 0)
            passed_pipe = False  # Resetar a passagem do cano

        # Verificar se o pássaro passou pelo cano
        if bird_x > pipe_x + PIPE_WIDTH and not passed_pipe:
            score += 1
            passed_pipe = True

        # Desenhar fundo
        screen.blit(background_img, (0, 0))

        draw_bird(bird_x, bird_y)
        draw_pipes(pipe_x, pipe_y)

        # Mostrar pontuação
        score_text = font.render(f"Score: {score}", True, BLACK)
        screen.blit(score_text, [10, 10])

        if check_collision(bird_x, bird_y, pipe_x, pipe_y):
            show_message("Game Over", BLACK)
            pygame.time.wait(2000)  # Pausa de 2 segundos
            show_message("Pressione R para Reiniciar", BLACK, 50)
            waiting_for_restart = True
            while waiting_for_restart:
                for event in pygame.event.get():
                    if event.type == pygame.QUIT:
                        pygame.quit()
                        quit()
                    if event.type == pygame.KEYDOWN:
                        if event.key == pygame.K_r:
                            waiting_for_restart = False
                            game_loop()  # Reinicia o jogo

        pygame.display.update()
        clock.tick(FPS)

    print(f"Game Over! Your score: {score}")

def show_start_screen():
    screen.blit(background_img, (0, 0))
    show_message("Flappy Bird", BLACK)
    show_message("Pressione Espaço para Jogar", BLACK, 50)
    pygame.display.update()

    waiting_for_start = True
    while waiting_for_start:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                pygame.quit()
                quit()
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_SPACE:
                    waiting_for_start = False

# Mostrar a tela inicial
show_start_screen()
# Iniciar o jogo
game_loop()
