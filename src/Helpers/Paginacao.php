<?php

namespace Crmall\Helpers;

class Paginacao
{
    private $pagina;
    private $total;
    private $quantidade;
    private $url;
    private $parametros = [];

    public function __construct($pagina, $total_registros, $quantidade)
    {
        $this->pagina = $pagina;
        $this->total  = $total_registros;
        $this->quantidade = $quantidade;
    }
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function setParametros($param)
    {
        $this->parametros = $param;
    }

    public function getTotalPorPagina()
    {
        return  ceil($this->total / $this->quantidade);
    }

    public function verParametros()
    {
        var_dump($this->parametros);
    }

    function gerarPaginacao()
    {
        $param = (is_array($this->parametros) && count($this->parametros) > 0) ? '&' . http_build_query($this->parametros) : '';
        $result =   '<div class="paginacao">';
        $result .= 'Paginas: ';
        for ($i = 1; $i <= $this->getTotalPorPagina(); $i++) {
            if ($this->pagina == $i) {
                $result .=  sprintf('<b>%s</b> | ', $i);
            } else {
                $result .= sprintf('<a href="%s?pagina=%s%s">%s</a> | ', $this->url, $i, $param, $i);
            }
        }
        $result .= '</div>';
        echo $result;
    }

    public function gerarLink()
    {
        $param = (is_array($this->parametros) && count($this->parametros) > 0) ? '&' . http_build_query($this->parametros) : '';
        $result = sprintf('%s?pagina=1%s', $this->url, $param);
        echo $result;
    }
}
