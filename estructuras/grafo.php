<?php
/**
 * Clase Grafo
 * Modelo un grafo no dirigido usando arreglos asociativos.
 * Cada nodo puede tener múltiples conexiones (vecinos).
 */
class Grafo {
    private $nodos = []; // Lista de nodos (mesas)
    private $aristas = []; // Aristas que conectan nodos (vecindad entre mesas)

    public function agregarNodo($nodo) {
        if (!in_array($nodo, $this->nodos)) {
            $this->nodos[] = $nodo;
            $this->aristas[$nodo] = [];
        }
    }

    public function agregarArista($desde, $hasta) {
        if (in_array($desde, $this->nodos) && in_array($hasta, $this->nodos)) {
            $this->aristas[$desde][] = $hasta;
            $this->aristas[$hasta][] = $desde; // Grafo no dirigido
        }
    }

    /**
     * Muestra el grafo en consola.
     */

    public function mostrarGrafo() {
        foreach ($this->aristas as $nodo => $vecinos) {
            echo "$nodo está conectado con: " . implode(", ", $vecinos) . "\n";
        }
    }
}