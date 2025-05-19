<?php
// Clase Pila (estructura LIFO)
class Pila {
    private $elementos = [];

    // Apila un nuevo plato servido
    public function apilar($elemento) {
        array_push($this->elementos, $elemento);
    }

    // Desapila el último plato servido
    public function desapilar() {
        return array_pop($this->elementos);
    }

    // Verifica si la pila está vacía
    public function estaVacia() {
        return empty($this->elementos);
    }

    // Muestra todos los platos servidos
    public function mostrar() {
        for ($i = count($this->elementos) - 1; $i >= 0; $i--) {
            echo " - " . $this->elementos[$i] . "\n";
        }
    }
}
?>