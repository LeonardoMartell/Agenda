<?php
namespace Projeto\Agenda\Classes;
use InvalidArgumentException;
class Contato
{
    //diretório do arquivo que guardará os dados
    public $file = __DIR__.'../../assets/agenda.json';

    //retorna o array com os valores (Contatos)
    public function mostrarContatos(){
        $agenda = [];

        if(filesize($this->file) > 0){
            $agenda = file_get_contents($this->file);
            $agenda = json_decode($agenda, True);
        }

        return $agenda;
    }

    //Verifica se os dados enviados são compatíveis e adiciona um novo contato no array

    public function criarContato(string $nome, string $telefone){
        //Confere se o telefone é um valor válido

        if(is_numeric($telefone) && (strlen($telefone) === 11)){
            //extraindo o valor do json e transformando em array

            $agenda = [];

            if(filesize($this->file) > 0){
                $agenda = file_get_contents($this->file);
                $agenda = json_decode($agenda, True);
            }

            array_push($agenda, ['id' => $_SESSION['id'], 'Nome'=>$nome, 'Telefone'=>$telefone]);

            //tranformando o array em json e mandando pro arquivo novamente

            $agenda = json_encode($agenda);
            file_put_contents($this->file, $agenda);

            //Sempre que um valor é adicionado ao array variavel id da session atualiza, fazendo assim um auto increment
            $_SESSION['id']++;
        }else{
            throw new InvalidArgumentException('Digite um telefone válido');
        }
    }

    //Verifica se os dados enviados são compatíveis e altera um dado ja existente no array

    public function editarContato(int $indice, string $novoNome, string $novoTel){
        //confere se o telefone é um valor válido

        if(is_numeric($novoTel) && (strlen($novoTel) === 11)){
            $agenda = file_get_contents($this->file);
            $agenda = json_decode($agenda, True);

            //varre cada item no array e quando achar o valor correspondente e faz a mudança no item

            foreach($agenda as $index => $item){
                if($item['id'] === $indice){
                    $agenda[$index]['Nome'] = $novoNome;
                    $agenda[$index]['Telefone'] = $novoTel;
                }
            }

            $agenda = json_encode($agenda);
            file_put_contents($this->file, $agenda);
        }else{
            throw new InvalidArgumentException('Digite um telefone valido');
        }
    }

    //Apaga os dados de um arquivo

    public function deletarContato(int $indice){
        //variavel que confere se um dado existente foi achado

        $achou = 0;

        //Verifica se o dado passado não está vazio e é numerico

        if(!empty($indice) && is_numeric($indice)){
            $agenda = file_get_contents($this->file);
            $agenda = json_decode($agenda, True);

            //Varre cada elemento até achar o id correspondente ao item

            foreach ($agenda as $index => $item) {
                if ($item['id'] === $indice) {
                    unset($agenda[$index]);
                    $agenda = array_values($agenda);

                    //Acrescenta um na variável, assim mostrando que há um elemento correspondente
                    $achou++;
                }
            }

            //Se não achar o valor correspondente retorna um erro

            if(!($achou === 1)){
                throw new InvalidArgumentException('Elemento inválido');
            } else{
                $agenda = json_encode($agenda);
                file_put_contents($this->file, $agenda);
            }
        }
    }
}