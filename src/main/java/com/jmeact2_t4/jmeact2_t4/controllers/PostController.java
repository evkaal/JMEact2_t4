package com.jmeact2_t4.jmeact2_t4.controllers;

import com.jmeact2_t4.jmeact2_t4.dto.ProductoDTO;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api")
public class PostController {

    @PostMapping("/productos")
    public ResponseEntity<ProductoDTO> crearProductoApi(@RequestBody ProductoDTO nuevoProducto) {
        return ResponseEntity.ok(nuevoProducto);
    }
}