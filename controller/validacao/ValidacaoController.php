
<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php");

class ValidacaoController
{


    public static function validarCpf($cpf)
    {

        if (strlen($cpf) == 14) {

            $cpfFormatado = str_replace(".", "", $cpf);
            $cpfFormatado = str_replace("-", "", $cpfFormatado);


            $vetCpf = $cpfFormatado;

            $primeiroCaracter = $vetCpf[0];

            for ($i = 1; $primeiroCaracter == $vetCpf[$i]; $i++) {
                if ($i == strlen($vetCpf) - 1) {
                    
                    return false;
                }
            }

            $primeiraSoma = 0;

            for ($i = 0, $m = 10; $i < strlen($vetCpf) - 2; $i++, $m--) {

                $primeiraSoma += $vetCpf[$i] * $m;
            }
            $primeiroResto = ($primeiraSoma * 10) % 11;

            if (
                $primeiroResto == $vetCpf[strlen($vetCpf) - 2] ||
                ($primeiroResto == 10 && $vetCpf[strlen($vetCpf) - 2] == 0)
            ) {

                $segundaSoma = 0;

                for ($i = 0, $m = 11; $i < strlen($vetCpf) - 1; $i++, $m--) {

                    $segundaSoma += $vetCpf[$i] * $m;
                }

                $segundoResto = ($segundaSoma * 10) % 11;

                if (
                    $segundoResto == $vetCpf[strlen($vetCpf) - 1] ||
                    ($segundoResto == 10 && $vetCpf[strlen($vetCpf) - 1] == 0)
                ) {
                    
                    return true;
                } else {

                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function validarNome($nome)
    {

        if (strlen($nome) >= 3) {
            return true;
        }
        return false;
    }

    public static function validarEmail($email)
    {

        $pattern = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";

        return preg_match($pattern, $email);
    }

    public static function validarCep($cep)
    {

        define("CEP_VALIDO", true);
        define("CEP_INVALIDO", false);

        $cep = preg_replace("/[^0-9]/", "", $cep);

        $url = "http://viacep.com.br/ws/$cep/json/";

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $vetEndereco = json_decode(curl_exec($curl), true);

        if (count($vetEndereco) >= 9) {

            $vetEndereco["sucesso"]  = CEP_VALIDO;
            return $vetEndereco;
        } else {

            $vetEndereco["sucesso"]  = CEP_INVALIDO;
            return $vetEndereco;
        }
    }

    public static function validarSexo($sexoId)
    {

        $sexDao = new SexoDAO();

        return $sexDao->verificaExistenciaPeloId($sexoId);
    }

    public static function validarTipoSanguineo($tipoSanguineoId)
    {

        $tipoSanguineoDAO = new TipoSanguineoDAO();
        return $tipoSanguineoDAO->verificarExistenciaPeloId($tipoSanguineoId);
    }

    public static function validarTipoFatorRh($fatorRhId)
    {

        $fatorRhDAO = new FatorRhDAO();
        return $fatorRhDAO->verificarExistenciaPeloId($fatorRhId);
    }
}
