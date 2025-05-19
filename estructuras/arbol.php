<?php
// Nodo para árbol binario de historial
class NodoArbol {
    public $dato;
    public $izquierda;
    public $derecha;

    public function __construct($dato) {
        $this->dato = $dato;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

// Árbol binario para historial de clientes
class Arbol {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    // Inserta un cliente en el árbol
    public function insertar($dato) {
        $this->raiz = $this->insertarRecursivo($this->raiz, $dato);
    }

    private function insertarRecursivo($nodo, $dato) {
        if ($nodo == null) return new NodoArbol($dato);
        if ($dato < $nodo->dato) {
            $nodo->izquierda = $this->insertarRecursivo($nodo->izquierda, $dato);
        } else {
            $nodo->derecha = $this->insertarRecursivo($nodo->derecha, $dato);
        }
        return $nodo;
    }

    // Recorre en orden (inorder)
    public function mostrarInorden() {
    $this->inOrden($this->raiz);
}
    private function inOrden($nodo) {
        if ($nodo != null) {
            $this->inOrden($nodo->izquierda);
            echo " - " . $nodo->dato . "\n";
            $this->inOrden($nodo->derecha);
        }
    }
}
?>
