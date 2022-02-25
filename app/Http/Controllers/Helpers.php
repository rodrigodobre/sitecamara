<?php
/**
 * Created by PhpStorm.
 * User: rodrigodobre
 * Date: 06/04/19
 * Time: 18:49
 */

namespace App\Http\Controllers;


class Helpers
{
    public function resumo($var, $limite){
        //// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.
        if (strlen($var) > $limite){
            return substr_replace ($var, '...', $limite);
        }
        else{
            // Se não for maior que o limite, ele não adiciona nada.
            return substr_replace ($var, '', $limite);
        }
    }
    public function rip_tags($string) {

        // ----- remove HTML TAGs -----
        $string = preg_replace ('/<[^>]*>/', ' ', $string);

        // ----- remove control characters -----
        $string = str_replace("\r", ' ', $string);    // --- replace with empty space
        $string = str_replace("\n", ' ', $string);   // --- replace with space
        $string = str_replace("\t", ' ', $string);   // --- replace with space

        // ----- remove multiple spaces -----
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        return $string;

    }
}