<?php
// Archivo principal que usa todas las estructuras
require_once 'estructuras/Cola.php';
require_once 'estructuras/ListaEnlazada.php';
require_once 'estructuras/Pila.php';
require_once 'estructuras/Arbol.php';
require_once 'estructuras/Grafo.php';

// Menú disponible (arreglo simple)
$menu = [
    "Hamburguesa", "Pizza", "Ensalada", "Refresco", "Papas fritas",
    "Sopa", "Pollo frito", "Postre", "Sandwich", "Jugo natural"
];

// Crear estructuras
$colaClientes = new Cola();
$pilaPlatosServidos = new Pila();
$arbolHistorial = new Arbol();
$grafoMesas = new Grafo();

// Arreglo para clientes (simple lista en memoria)
$clientes = ["Ana", "Luis", "Sofía"];
foreach ($clientes as $cliente) {
    $colaClientes->encolar($cliente);
}

// Configurar grafo de mesas
$grafoMesas->agregarNodo("Mesa 1");
$grafoMesas->agregarNodo("Mesa 2");
$grafoMesas->agregarNodo("Mesa 3");
$grafoMesas->agregarNodo("Mesa 4");

$grafoMesas->agregarArista("Mesa 1", "Mesa 2");
$grafoMesas->agregarArista("Mesa 2", "Mesa 3");
$grafoMesas->agregarArista("Mesa 3", "Mesa 4");
$grafoMesas->agregarArista("Mesa 1", "Mesa 4");

// Función para generar pedido aleatorio
function generarPedidoAleatorio($menu) {
    shuffle($menu);
    $cantidad = rand(2, 4);
    return array_slice($menu, 0, $cantidad);
}

// Atender clientes
while (!$colaClientes->estaVacia()) {
    $cliente = $colaClientes->desencolar();
    echo "🧍 Cliente atendido: $cliente\n";

    // Lista enlazada para el pedido
    $pedido = new ListaEnlazada();
    $platos = generarPedidoAleatorio($menu);

    echo "🍽 Pedido:\n";
    foreach ($platos as $plato) {
        $pedido->agregar($plato);
        $pilaPlatosServidos->apilar("$cliente: $plato");
    }
    $pedido->mostrar();

    echo "✅ Pedido completo para $cliente\n\n";

    // Insertar cliente en árbol para historial ordenado
    $arbolHistorial->insertar($cliente);
}

// Mostrar platos servidos (pila)
echo "📦 Platos servidos (últimos primero):\n";
$pilaPlatosServidos->mostrar();

// Mostrar historial clientes (árbol)
echo "\n🗂 Historial de clientes (ordenado alfabéticamente):\n";
$arbolHistorial->mostrarInorden();

// Mostrar grafo mesas
echo "\n🛋️ Grafo de mesas y sus vecinos:\n";
$grafoMesas->mostrarGrafo();