package com.jmeact2_t4.jmeact2_t4.controllers;

import com.jmeact2_t4.jmeact2_t4.dto.ProductoDTO;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

@Controller
public class MvcController {

    @Value("${mi.nombre.autor}")
    private String autor;

    @Value("${mi.app.titulo}")
    private String tituloApp;

    // Lista simulada en memoria
    private List<ProductoDTO> obtenerProductosMock() {
        List<ProductoDTO> lista = new ArrayList<>();
        lista.add(new ProductoDTO("Laptop Lenovo", 12000.0, "Computo"));
        lista.add(new ProductoDTO("Mouse Inalámbrico", 350.0, "Accesorios"));
        lista.add(new ProductoDTO("Teclado Mecánico", 850.0, "Accesorios"));
        lista.add(new ProductoDTO("Monitor 24\"", 3200.0, "Computo"));
        return lista;
    }

    // a) Vista con lista usando Model y th:each + @RequestParam opcional para filtrar por categoría
    @GetMapping("/productos")
    public String listarProductos(@RequestParam(required = false) String categoria, Model model) {
        List<ProductoDTO> productos = obtenerProductosMock();
        
        if (categoria != null && !categoria.isEmpty()) {
            productos = productos.stream()
                    .filter(p -> p.getCategoria().equalsIgnoreCase(categoria))
                    .collect(Collectors.toList());
        }

        model.addAttribute("titulo", tituloApp);
        model.addAttribute("autor", autor);
        model.addAttribute("productos", productos);
        model.addAttribute("categoriaSeleccionada", categoria);
        return "productos"; // Renderiza productos.html
    }

    // Endpoint con @PathVariable para ver detalle por nombre o ID
    @GetMapping("/producto/detalle/{nombre}")
    public String detalleProducto(@PathVariable String nombre, Model model) {
        ProductoDTO encontrado = obtenerProductosMock().stream()
                .filter(p -> p.getNombre().equalsIgnoreCase(nombre))
                .findFirst()
                .orElse(new ProductoDTO(nombre, 0.0, "Desconocida"));

        model.addAttribute("producto", encontrado);
        model.addAttribute("autor", autor);
        return "detalle"; // Renderiza detalle.html
    }

    // b) Vista con formulario usando @ModelAttribute
    @GetMapping("/producto/nuevo")
    public String mostrarFormulario(Model model) {
        model.addAttribute("productoForm", new ProductoDTO());
        model.addAttribute("autor", autor);
        return "formulario"; // Renderiza formulario.html
    }

    @PostMapping("/producto/nuevo")
    public String procesarFormulario(@ModelAttribute ProductoDTO productoForm, Model model) {
        model.addAttribute("producto", productoForm);
        model.addAttribute("autor", autor);
        return "resultado"; // Renderiza resultado.html con los datos recibidos
    }
}