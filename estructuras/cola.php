<?php
// Clase Nodo para la cola
class NodoCola {
    public $valor;
    public $siguiente;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->siguiente = null;
    }
}

// Clase Cola (estructura FIFO)
class Cola {
    private $frente;
    private $final;

    public function __construct() {
        $this->frente = null;
        $this->final = null;
    }

    // Agrega un cliente al final de la cola
    public function encolar($valor) {
        $nuevo = new NodoCola($valor);
        if ($this->final != null) {
            $this->final->siguiente = $nuevo;
        }
        $this->final = $nuevo;
        if ($this->frente == null) {
            $this->frente = $nuevo;
        }
    }

    // Elimina y retorna el primer cliente de la cola
    public function desencolar() {
        if ($this->frente == null) return null;
        $valor = $this->frente->valor;
        $this->frente = $this->frente->siguiente;
        if ($this->frente == null) {
            $this->final = null;
        }
        return $valor;
    }

    // Verifica si la cola está vacía
    public function estaVacia() {
        return $this->frente == null;
    }
}
?>
