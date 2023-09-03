#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main() {
	// Imprime o cabeçalho do nosso jogo
	printf("******************************************\n");
	printf("* Bem vindo ao jogo de adivinhação *\n");
	printf("******************************************\n");

	int segundos = time(0);
	srand(segundos);

	int numerogrande = rand();

	int numerosecreto = numerogrande % 100;

	int chute;
	int tentativas = 1;

	int numerodetentativas;

	printf("Nivel de dificuldade: Facil(1), Medio(2) e Dificil(3)\n");
	scanf("%d", &numerodetentativas);

	if ( numerodetentativas == 1 ){
		numerodetentativas = 20;
	} else if ( numerodetentativas == 2 ){
		numerodetentativas = 15;
	} else {
		numerodetentativas = 6;
	}



	double pontos = 1000;

	for(int i = 1; i < numerodetentativas; i++) {

		printf("Tentativas: %d\n", tentativas);
		printf("Qual e o seu chute? ");
		scanf("%d", &chute);
		printf("Seu chute foi %d\n", chute);

		if ( chute < 0 ) {
			printf("Tente novamente!");
			continue;
		}

		if ( chute == numerosecreto ) {
			printf("=========================\n");
			printf("Parabens! Voce acertou\n");
			printf("=========================\n");
			break;

		} else {

			if ( chute > numerosecreto ) {
				printf("Seu chute foi maior que o numero secreto\n");
			}

			else {
				printf("Seu chute foi menor que o numero secreto\n");
			}
			double pontosperdidos = abs( chute - numerosecreto ) / (double)2;
			pontos = pontos - pontosperdidos;
		}
		tentativas++;
	}
	printf("Numero de tentativas: %d\n", tentativas);
	printf("=========================\n");
	printf("Total de pontos: %.1f",pontos);
}
