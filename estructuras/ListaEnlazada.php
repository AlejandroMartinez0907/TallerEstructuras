<?php
// Clase Nodo para la lista enlazada
class NodoLista {
    public $dato;
    public $siguiente;

    public function __construct($dato) {
        $this->dato = $dato;
        $this->siguiente = null;
    }
}

// Lista enlazada para pedidos por cliente
class ListaEnlazada {
    private $cabeza;

    public function __construct() {
        $this->cabeza = null;
    }

    // Agrega un nuevo pedido al final de la lista
    public function agregar($dato) {
        $nuevo = new NodoLista($dato);
        if ($this->cabeza == null) {
            $this->cabeza = $nuevo;
        } else {
            $temp = $this->cabeza;
            while ($temp->siguiente != null) {
                $temp = $temp->siguiente;
            }
            $temp->siguiente = $nuevo;
        }
    }

    // Muestra todos los pedidos
    public function mostrar() {
        $temp = $this->cabeza;
        while ($temp != null) {
            echo " - " . $temp->dato . "\n";
            $temp = $temp->siguiente;
        }
    }
}
?>
