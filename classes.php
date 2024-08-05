<?php

class Conversao{
    private $dicionario_romano = [
        'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50,
        'C' => 100, 'D' => 500, 'M' => 1000
    ];

    private $dicionario_arabe = [
        1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
        100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
        10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I'
    ];

    public function ParaRomano(int $num): string { //FUNÇÃO DE ARABICO PARA ROMANO
        $total = '';

        foreach ($this->dicionario_arabe as $value => $symbol) { //PERCORRE DICIONARIO ARABICO
            while ($num >= $value) {                             //ENQUANTO VALOR DO DICIONARIO FOR MAIOR QUE O VALOR DE ENTRADA
                $total .= $symbol;                               //ACRESCENTA SIMBOLO NA RESPOSTA
                $num -= $value;                                  //SUBTRAI VALOR DE ENTRADA
            }
        }
        return $total;
    }

        /*EXEMPLO DE FUNCIONAMENTO:

            ENTRADA: 3739
            M 3739 - 1000 = 2739
            MM 2739 - 1000 = 1739
            MMM 1739 - 1000 = 739
            MMMD 739 - 500 = 239
            MMMDC 239 - 100 = 139
            MMMDCC 139 - 100 = 39
            MMMDCCX 39 - 10 = 29
            MMMDCCXX 29 - 10 = 19
            MMMDCCXXX 19 - 10 = 9
            MMMDCCXXXIX 9 - 9 = 0
            SAIDA: MMMDCCXXXIX 
        */

    public function ParaArabico(string $s): int {                          //FUNÇÃO DE ROMANO PARA ARABICO
        $i = 0;
        $total = 0;
        $tamanho_numero = strlen($s);

        while ($i < $tamanho_numero) {                                    //PERCORRE O NUMERO DE ENTRADA
            $valor_atual = $this->dicionario_romano[$s[$i]];              //DEFINE VALOR ATUAL COMPARANDO LETRA COM DICIONARIO

            if ($i + 1 < $tamanho_numero) {                               //VERIFICA SE EXISTE UM PROXIMO DIGITO
                $proximo_valor = $this->dicionario_romano[$s[$i + 1]];          //SE EXISTIR, DEFINE O PROXIMO DIGITO
            } else {
                $proximo_valor = 0;                                             //SE NÃO,DEFINE O PROXIMO DIGITO COMO 0 
            }

            if ($valor_atual >= $proximo_valor) {                         //VERIFICA SE O PROXIMO DIGITO É MAIOR QUE O ATUAL
                $total += $valor_atual;                                         //SE SIM, ACRESCENTA VALOR AO TOTAL DA RESPOSTA.
            } else {    
                $total -= $valor_atual;                                        //SE NÃO, SUBTRAI O VALOR ( ISSO ACONTECE COM NUMEROS COMO 4 OU 9)
            }

            $i++;                                                         //VAI PARA O PRÓXIMO DIGITO
        }

        return $total;
    }

        /*EXEMPLO DE FUNCIONAMENTO:

            ENTRADA: MCMXCIV 
            TOTAL=0
            DIGITO ATUAL M = 1000, PROXIMO DIGITO C= 100.   +1000 TOTAL = 1000
            DIGITO ATUAL C = 100,  PROXIMO DIGITO M = 1000.  -100 TOTAL =  900
            DIGITO ATUAL M = 1000, PROXIMO DIGITO X = 10.   +1000 TOTAL = 1900
            DIGITO ATUAL X = 10,   PROXIMO DIGITO C = 100.    -10 TOTAL = 1890
            DIGITO ATUAL C = 100,  PROXIMO DIGITO I = 1.     +100 TOTAL = 1990
            DIGITO ATUAL I = 1,    PROXIMO DIGITO V = 5.       -1 TOTAL = 1989 
            DIGITO ATUAL V = 5,    PROXIMO DIGITO = 0.         +5 TOTAL = 1994
            SAIDA: 1994

        */

}
?>
