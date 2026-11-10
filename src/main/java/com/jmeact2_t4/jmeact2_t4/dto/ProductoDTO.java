package com.jmeact2_t4.jmeact2_t4.dto;

public class ProductoDTO {
    private String nombre;
    private double precio;
    private String categoria;

    // Constructores, Getters y Setters
    public ProductoDTO() {}

    public ProductoDTO(String nombre, double precio, String categoria) {
        this.nombre = nombre;
        this.precio = precio;
        this.categoria = categoria;
    }

    public String getNombre() { return nombre; }
    public void setNombre(String nombre) { this.nombre = nombre; }
    
    public double getPrecio() { return precio; }
    public void setPrecio(double precio) { this.precio = precio; }
    
    public String getCategoria() { return categoria; }
    public void setCategoria(String categoria) { this.categoria = categoria; }
}