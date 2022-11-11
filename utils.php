<?php
    function Listar($selecao){
        $html = "";
        $html .= "<option value=''>Selecione</option>";
        $html .= "<option value='medio' ".($selecao == "medio" ? "selected" : "").">Ensino Médio</option>";
        $html .= "<option value='fundamentalII' ".($selecao == "Ensino Fundamental II" ? "selected" : "").">Ensino Fundamental II</option>";
        $html .= "<option value='fundamentalMedio' ".($selecao == "Ensino Fundamental e Médio" ? "selected" : "").">Ensino Fundamental e Médio</option>";
        return $html;
    }
?>
        