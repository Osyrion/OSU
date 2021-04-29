package com.durovic;

public class Card {
    private String color;
    private String rank;
    private String shape;

    public Card(String color, String rank, String shape) {
        this.color = color;
        this.rank = rank;
        this.shape = shape;
    }

    public String getColor() {
        return color;
    }

    public String getRank() {
        return rank;
    }

    public String getShape() {
        return shape;
    }

    public String getInfo() {
        return "Card[color:" + color + "; rank:" + rank + "; shape:" + shape + "]";
    }
}
